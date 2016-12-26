<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 09/12/16
 * Time: 17:06
 */

namespace Egressos\Application\Model;


use Cupcake\ObjectMapper\ObjectMapper;

class UserModel
{
    /**
     * @var \stdClass
     */
    private $userFromDatabase;
    /**
     * @var ObjectMapper
     */
    private $dataHelper;

    /**
     * UserModel constructor.
     * @param \stdClass $userFromDatabase
     * @param ObjectMapper $dataHelper
     */
    public function __construct(\stdClass $userFromDatabase, ObjectMapper $dataHelper)
    {
        $this->userFromDatabase = $userFromDatabase;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($name)
    {
        if (property_exists($this->userFromDatabase, $name)) {
            return $this->userFromDatabase->{$name};
        }
        throw new \Exception(sprintf('Propriedade "&s" nao existe.', $name));
    }

    /**
     * @return UserModel[]
     */
    public function getSolicitacoesEnviadas()
    {
        $amigos = $this->dataHelper->listar('amizades', '', 1, 0,
            'where id_usuario = ' . $this->id . ' and ativo=0')->registros;
        $amigosDatabase = [];
        foreach ($amigos as $key => $item) {
            $amigosDatabase[$key] = $this->dataHelper->ver('usuario', $item->id_amigo);
            $amigosDatabase[$key]->solicitacaoAceita = $item->ativo == 1;
            $amigosDatabase[$key]->solicitacao = $item;

        }
        return self::hydrateUserList($amigosDatabase, $this->dataHelper);
    }

    public function getAmigos()
    {
        $amigos = $this->dataHelper->listar('amizades', '', 1, 0,
            'where (id_usuario = ' . $this->id . ' or id_amigo = ' . $this->id . ') and ativo = 1')->registros;
        $amigosDatabase = [];
        foreach ($amigos as $key => $item) {
            $amigosDatabase[$key] = $this->dataHelper->ver('usuario',
                $item->id_amigo == $this->id ? $item->id_usuario : $item->id_amigo);
            $amigosDatabase[$key]->solicitacaoAceita = $item->ativo == 1;
            $amigosDatabase[$key]->solicitacao = $item;

        }
        return self::hydrateUserList($amigosDatabase, $this->dataHelper);
    }

    public function getSolicitacoesDeAmizade()
    {
        $amigos = $this->dataHelper->listar('amizades', '', 1, 0,
            'where id_amigo = ' . $this->id . ' and ativo=0')->registros;
        $amigosDatabase = [];
        foreach ($amigos as $key => $item) {
            $amigosDatabase[$key] = $this->dataHelper->ver('usuario', $item->id_usuario);
            $amigosDatabase[$key]->solicitacaoAceita = $item->ativo == 1;
            $amigosDatabase[$key]->solicitacao = $item;

        }
        return self::hydrateUserList($amigosDatabase, $this->dataHelper);
    }

    /**
     * @param UserModel $user
     * @return bool
     */
    public function isFriendOf(UserModel $user)
    {
        foreach ($this->getAmigos() as $amigo) {
            if ($amigo->id == $user->id) {
                return true;
            }
        }
        return false;
//        return in_array($user,$this->getAmigos());
    }

    /**
     * @param int $size
     * @return string
     */
    public function getAvatar($size = 360)
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=' . $size . '&d=mm';
    }

    public function getCampus()
    {
        return $this->dataHelper->ver('campus', $this->id_campus);
    }

    public function getTitulacao()
    {
        return $this->dataHelper->ver('titulacao', $this->id_titulacao);
    }

    public function getCurso()
    {
        return $this->dataHelper->ver('cursos', $this->id_curso);
    }

    public function getMd5Email()
    {
        return md5($this->email);
    }

    /**
     * @param $list
     * @param ObjectMapper $dataHelper
     * @return UserModel[]
     */
    public static function hydrateUserList($list, ObjectMapper $dataHelper)
    {
        $hydratedResult = [];
        foreach ($list as &$item) {
            $hydratedResult[] = new UserModel($item, $dataHelper);
        }
        return $hydratedResult;
    }

}
