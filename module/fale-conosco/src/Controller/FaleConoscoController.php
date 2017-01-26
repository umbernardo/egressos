<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 09:25
 */

namespace Egressos\FaleConosco\Controller;


use Cupcake\Request\RequestManager;
use Egressos\FaleConosco\MailSender\FaleConoscoMailSender;
use League\Plates\Engine;

final class FaleConoscoController
{
    /**
     * @var Engine
     */
    private $templateEngine;
    /**
     * @var FaleConoscoMailSender
     */
    private $mailSender;
    /**
     * @var RequestManager
     */
    private $request;

    /**
     * FaleConoscoController constructor.
     * @param Engine $templateEngine
     * @param FaleConoscoMailSender $mailSender
     * @param RequestManager $requestManager
     */
    public function __construct(
        Engine $templateEngine,
        FaleConoscoMailSender $mailSender,
        RequestManager $requestManager
    ) {
        $this->templateEngine = $templateEngine;
        $this->mailSender = $mailSender;
        $this->request = $requestManager;
    }


    /**
     * @return bool|string
     */
    public function actionIndex()
    {
        if ($this->request->isPostRequest()) {
            return $this->sendMail();
        }

        return $this->templateEngine->render('site::fale-conosco');
    }

    public function actionSuccess()
    {
        return $this->templateEngine->render('faleConosco::sucesso');
    }

    public function actionError()
    {
        return $this->templateEngine->render('faleConosco::erro');

    }

    private function sendMail()
    {
        if (false == $this->mailSender->sendFaleConoscoEmail($this->getInputPostAsArray())) {
            return $this->request->redirect('/fale-conosco/erro');
        }

        return $this->request->redirect('/fale-conosco/sucesso');
    }

    /**
     * @return array
     */
    private function getInputPostAsArray()
    {
        return filter_input_array(INPUT_POST);
    }

}
