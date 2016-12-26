<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 09/12/16
 * Time: 15:07
 */

namespace Egressos\Application\Controller;


use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;
use League\Plates\Engine;

class LoginController
{
    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var Engine
     */
    private $templateEngine;

    /**
     * @var RequestManager
     */
    private $requestManager;

    /**
     * LoginController constructor.
     * @param UserManager $userManager
     * @param Engine $templateEngine
     * @param RequestManager $requestManager
     */
    public function __construct(UserManager $userManager, Engine $templateEngine, RequestManager $requestManager)
    {
        $this->userManager = $userManager;
        $this->templateEngine = $templateEngine;
        $this->requestManager = $requestManager;
    }

    /**
     * @return string
     */
    public function actionLogin()
    {
        if ($this->requestManager->isPostRequest()) {
            return $this->efetuarLogin();
        }
        return $this->templateEngine->render('site::login');
    }

    public function actionLogout()
    {
        @session_destroy();
        return $this->requestManager->redirect('/home');
    }

    /**
     * @return string
     */
    public function efetuarLogin()
    {
        $credenciais = $this->getCredenciaisFromPost();
        $usuario = $this->userManager->verificarCredenciais($credenciais);
        if ($usuario === false) {
            return $this->templateEngine->render('site::login', ['message' => 'Usuário ou senha inválido.']);
        }
        $this->userManager->logar($usuario);
        $this->requestManager->redirect('/dashboard');
        return '';
    }

    public function efetuarLogoff()
    {
        if ($this->userManager->usuarioEstaLogado()) {

        }
    }

    /**
     * @return mixed
     */
    private function getCredenciaisFromPost()
    {
        return filter_input_array(
            INPUT_POST,
            array(
                'email' => FILTER_SANITIZE_EMAIL,
                'password' => FILTER_SANITIZE_STRING
            )
        );
    }
}
