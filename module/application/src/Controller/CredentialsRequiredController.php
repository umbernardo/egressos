<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 13/12/16
 * Time: 17:23
 */

namespace Egressos\Application\Controller;


use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;

abstract class CredentialsRequiredController
{

    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var RequestManager
     */
    private $requestManager;

    /**
     * CredentialsRequiredController constructor.
     * @param UserManager $userManager
     * @param RequestManager $requestManager
     */
    public function __construct(UserManager $userManager, RequestManager $requestManager)
    {
        $this->userManager = $userManager;
        $this->redirectNotLoggedUser();
        $this->requestManager = $requestManager;
    }

    private function redirectNotLoggedUser()
    {
        if (false == $this->userManager->usuarioEstaLogado()) {
            die($this->requestManager->redirect('/login'));
        }
    }

    /**
     * @return UserManager
     */
    public function getUserManager()
    {
        return $this->userManager;
    }

    /**
     * @return RequestManager
     */
    public function getRequestManager()
    {
        return $this->requestManager;
    }
}
