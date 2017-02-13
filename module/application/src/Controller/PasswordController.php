<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 11/02/17
 * Time: 09:25
 */

namespace Egressos\Application\Controller;


use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;
use Egressos\Application\Model\UserModel;
use Egressos\Mailer\MailSender\Exception\MailSendFailedException;
use League\Plates\Engine;
use PHPMailer;

class PasswordController
{
    const DEFAULT_MESSAGE = 'Foi enviado um e-mail de confirmação caso exista algum usuário com o email informado';
    /**
     * @var Engine
     */
    private $templateEngine;
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var RequestManager
     */
    private $requestManager;
    /**
     * @var PHPMailer
     */
    private $mailer;
    private $url;


    /**
     * PasswordController constructor.
     * @param Engine $templateEngine
     * @param UserManager $userManager
     * @param RequestManager $requestManager
     * @param PHPMailer $mailer
     * @param $url
     */
    public function __construct(
        Engine $templateEngine,
        UserManager $userManager,
        RequestManager $requestManager,
        PHPMailer $mailer,
        $url
    )
    {
        $this->templateEngine = $templateEngine;
        $this->userManager = $userManager;
        $this->requestManager = $requestManager;
        $this->mailer = $mailer;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function actionEsqueciSenha()
    {
        if ($this->requestManager->isPostRequest()) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $user = $this->userManager->findUserByEmail($email);
            if (false === $user) {
                return $this->templateEngine->render('site::esqueci-senha', array(
                    'message' => self::DEFAULT_MESSAGE
                ));
            }
            $this->sendRecoverPasswordMail($user);

            return $this->templateEngine->render('site::esqueci-senha', array(
                'message' => self::DEFAULT_MESSAGE
            ));
        }

        return $this->templateEngine->render('site::esqueci-senha');
    }

    public function actionRecuperarSenha($md5Email, $hash)
    {
        $user = $this->userManager->findUserByMd5Email($md5Email);
        if (false == $user instanceof UserModel || $hash !== $user->getReHashedPassword()) {
            header('Location: /home');
            return false;
        }
        $novaSenha = $this->userManager->atualizarSenha($user);
        $this->enviaEmailComNovaSenha($user, $novaSenha);
        return $this->templateEngine->render('site::esqueci-senha', array(
            'message' => 'Uma nova senha foi gerada e enviada para o seu e-mail.'
        ));
    }

    private function sendRecoverPasswordMail(UserModel $user)
    {
        try {
            $this->mailer->addAddress($user->email);
            $this->mailer->Subject = 'Recuperar Senha';
            $this->templateEngine->addData(array(
                'dados' => array(
                    'Mensagem' => 'Este e-mail foi enviado devido a uma solicitação de recuperação de senha para o seu usuário, para continuar acesse a url abaixo.',
                    'URL' => $this->getBaseUrlForMail() . '/recuperar-senha/' . $user->getMd5Email() . '/' . $user->getReHashedPassword(),
                ),
            ));

            $this->mailer->Body = $this->templateEngine->render('mailer::default');
            die($this->mailer->Body);
            return $this->mailer->send();
        } catch (MailSendFailedException $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    private function getBaseUrlForMail()
    {
        $context = $this->requestManager->getContext();
        return $context->getScheme() . '://' . $context->getHost();
    }

    private function enviaEmailComNovaSenha($user, $novaSenha)
    {
        try {
            $this->mailer->addAddress($user->email);
            $this->mailer->Subject = 'Nova Senha';
            $this->templateEngine->addData(array(
                'dados' => array(
                    'Mensagem' => 'Segue abaixo a nova senha gerada para o seu usuário.',
                    'Senha' => $novaSenha,
                    'URL de login' => $this->getBaseUrlForMail() . '/login',
                ),
            ));

            $this->mailer->Body = $this->templateEngine->render('mailer::default');
            die($this->mailer->Body);
            return $this->mailer->send();
        } catch (MailSendFailedException $e) {
            return false;
        }
    }
}
