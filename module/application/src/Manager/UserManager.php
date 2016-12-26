<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 07/12/16
 * Time: 16:40
 */

namespace Egressos\Application\Manager;


use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Egressos\Application\Model\UserModel;
use PDO;

class UserManager
{
    /**
     * @var ObjectMapper
     */
    private $dataHelper;
    /**
     * @var RequestManager
     */
    private $requestManager;
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * UserManager constructor.
     * @param ObjectMapper $dataHelper
     * @param RequestManager $requestManager
     */
    public function __construct(ObjectMapper $dataHelper, RequestManager $requestManager, \PDO $pdo)
    {
        $this->dataHelper = $dataHelper;
        $this->requestManager = $requestManager;
        $this->pdo = $pdo;
        if (session_id() == '' || !isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * @param array $credenciais
     * @return bool|mixed
     * @throws \Exception
     */
    public function verificarCredenciais(array $credenciais)
    {
        $usuario = $this->findUserByEmail($credenciais['email']);
        if (false == $usuario instanceof UserModel) {
            return false;
        }

        if (false == password_verify($credenciais['password'], $usuario->password)) {
            return false;
        }
        return $usuario;
    }

    /**
     * @param UserModel $usuario
     */
    public function logar(UserModel $usuario)
    {
        $_SESSION['user']['logado'] = true;
        $_SESSION['user']['id'] = $usuario->id;
    }

    /**
     * @return bool
     */
    public function usuarioEstaLogado()
    {
        return
            true == isset($_SESSION['user']) &&
            true == $_SESSION['user']['logado'];
    }

    /**
     * @return UserModel
     * @throws \Exception
     */
    public function getUsuarioLogado()
    {
        if (false == $this->usuarioEstaLogado()) {
            throw new \Exception('Usuario nao esta logado');
        }
        $userFromDatabase = $this->dataHelper->ver('usuario', $_SESSION['user']['id']);
        return new UserModel($userFromDatabase, $this->dataHelper);
    }

    public function findUserByEmail($email)
    {
        $user = $this->dataHelper->listar('usuario', '', 1, 1, 'where email="' . $email . '"');
        if (false == empty($user->registros)) {
            return new UserModel(reset($user->registros), $this->dataHelper);
        }
        return false;
    }

    public function findUserById($id)
    {
        $user = $this->dataHelper->listar('usuario', '', 1, 1, 'where id="' . $id . '"');
        if (false == empty($user->registros)) {
            return new UserModel(reset($user->registros), $this->dataHelper);
        }
        return false;
    }

    public function findUserByMd5Email($md5Email)
    {
        $user = $this->dataHelper->listar('usuario', '', 1, 1, 'where md5(email) = "' . $md5Email . '"');
        if (false == empty($user->registros)) {
            return new UserModel(reset($user->registros), $this->dataHelper);
        }
        return false;
    }

    public function searchUser($query)
    {
        $resultado = $this->dataHelper->listar('usuario', '', 1, 1,
            ' where ativo="Sim" and nome like "%' . $query . '%" and id !=' . $this->getUsuarioLogado()->id)->registros;

        return UserModel::hydrateUserList($resultado, $this->dataHelper);
    }

    public function enviarSolicitacaoDeAmizade(UserModel $usuarioLogado, UserModel $destinatario)
    {
        if (false == $usuarioLogado->isFriendOf($destinatario)) {
            try {
                $sql = "INSERT INTO `tbl_amizades` (`id`, `id_usuario`, `id_amigo`, `ordem`, `ativo`) VALUES (NULL, :id_usuario, :id_amigo, '0', :ativo);";
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $this->pdo->prepare($sql);
                $query->bindValue('id_usuario', $usuarioLogado->id);
                $query->bindValue('id_amigo', $destinatario->id);
                $query->bindValue('ativo', 0);
                $query->execute();
                return true;
            } catch (\Exception $e) {
                die($e->getMessage());
                return false;
            }
        }
        return false;
    }

    public function aceitarAmizade($id)
    {
        try {
            $sql = "UPDATE `tbl_amizades` SET `ativo` = '1' WHERE `tbl_amizades`.`id` = :id;";
            $query = $this->pdo->prepare($sql);
            $query->bindValue('id', $id);
            $query->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
            return false;
        }
        return false;
    }

    public function atualizarPerfil($data)
    {
        try {
            $sql = "UPDATE `tbl_usuario` SET `resumo` = :resumo , `interesses` = :interesses WHERE `tbl_usuario`.`id` = :id;";
            $query = $this->pdo->prepare($sql);
            $query->bindValue('id', $this->getUsuarioLogado()->id);
            $query->bindValue('resumo', utf8_decode($data['resumo']));
            $query->bindValue('interesses', utf8_decode($data['interesses']));
            $query->execute();
            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
            return false;
        }
        return false;

    }


}
