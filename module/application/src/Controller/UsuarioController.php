<?php
namespace Egressos\Application\Controller;

use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;
use League\Plates\Engine;

class UsuarioController extends CredentialsRequiredController
{
    /**
     * @var Engine
     */
    private $templateEngine;

    /**
     * SiteController constructor.
     * @param Engine $templateEngine
     * @param UserManager $userManager
     * @param RequestManager $requestManager
     */
    public function __construct(Engine $templateEngine, UserManager $userManager, RequestManager $requestManager)
    {
        $this->templateEngine = $templateEngine;
        return parent::__construct($userManager, $requestManager);
    }

    /**
     * @return string
     */
    public function actionDashboard()
    {
        return $this->templateEngine->render('site::dashboard', ['usuario' => $this->getUsuario()]);
    }

    /**
     * @return string
     */
    public function actionAmigos()
    {
        return $this->templateEngine->render('site::amigos', ['usuario' => $this->getUsuario()]);
    }

    public function actionVerPerfil($md5email)
    {
        return $this->templateEngine->render('site::perfil', [
            'usuario' => $this->getUserManager()->findUserByMd5Email($md5email)
        ]);
    }

    public function actionBuscarAmigos()
    {
        $query = $this->getQuerystringParameter('q');
        return $this->templateEngine->render('site::buscar-amigos', [
            'usuario' => $this->getUsuario(),
            'query' => $query,
            'lista' => $this->getUserManager()->searchUser($query),
        ]);
    }

    public function actionAdicionarAmigo($id)
    {
        if ($this->getUserManager()->enviarSolicitacaoDeAmizade($this->getUsuario(),
            $this->getUserManager()->findUserById($id))
        ) {
            return $this->getRequestManager()->redirect('/amigo-adicionado');
        }
        throw new \Exception('Ocorreu um problema ao adicionar o amigo.');
    }

    public function actionAceitarAmigo($id)
    {
        if ($this->getUserManager()->aceitarAmizade($id)) {
            return $this->getRequestManager()->redirect('/amigos');
        }
        throw new \Exception('Ocorreu um problema ao adicionar o amigo.');
    }

    public function actionEditarPerfil()
    {
        if ($this->getRequestManager()->isPostRequest()) {
            $this->atualizarPerfil();
        }
        return $this->templateEngine->render('site::editar-perfil',
            ['usuario' => $this->getUserManager()->getUsuarioLogado()]);
    }

    public function actionAmigoAdicionadoSucesso()
    {
        return $this->templateEngine->render('site::adicionado-sucesso');
    }

    /**
     * @return \Egressos\Application\Model\UserModel
     * @throws \Exception
     */
    private function getUsuario()
    {
        return $this->getUserManager()->getUsuarioLogado();
    }

    private function getQuerystringParameter($param)
    {
        return filter_input(INPUT_GET, $param, FILTER_SANITIZE_STRING);
//        parse_str($this->requestManager->getContext()->getQueryString(), $queryStringArray);
//        return $queryStringArray[$param];
    }

    private function atualizarPerfil()
    {
        $data = filter_input_array(INPUT_POST, [
            'resumo' => FILTER_SANITIZE_STRING,
            'interesses' => FILTER_SANITIZE_STRING,
        ]);
        return $this->getUserManager()->atualizarPerfil($data);
    }


}
