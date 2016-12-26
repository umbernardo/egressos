<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 15:21
 */

namespace Egressos\TrabalheConosco\Controller;


use Cupcake\Request\RequestManager;
use Egressos\TrabalheConosco\MailSender\TrabalheConoscoMailSender;
use League\Plates\Engine;

class TrabalheConoscoController
{
    public function __construct(
        Engine $templateEngine,
        TrabalheConoscoMailSender $mailSender,
        RequestManager $requestManager
    ) {
        $this->templateEngine = $templateEngine;
        $this->mailSender = $mailSender;
        $this->request = $requestManager;
    }

    public function actionIndex()
    {
        if ($this->request->isPostRequest()) {
            return $this->sendMail();
        }

        return $this->templateEngine->render('site::trabalhe-conosco');
    }


    public function actionSuccess()
    {
        return $this->templateEngine->render('trabalheConosco::sucesso');
    }

    public function actionError()
    {
        return $this->templateEngine->render('trabalheConosco::erro');
    }

    private function salvarArquivo($cvsFolder = 'cvs', $addPlusOneName = false)
    {
        if (isset($_FILES)) {
            foreach ($_FILES as $key => $value) {
                if ((!empty($value['name'])) && ($value['error'] == 0)) {
                    $nmExplode = explode('.', $value['name']);
                    $fileName = substr(md5(rand() . time()), 0, 15);
                    $code = $addPlusOneName ? $fileName . '_1' : $fileName;
                    $fileExtension = strtolower(end($nmExplode));
                    $cvsPath = 'uploads/' . $cvsFolder . '/';
                    if (false == is_dir($cvsPath)) {
                        mkdir($cvsPath);
                    }
                    move_uploaded_file($value['tmp_name'], $cvsPath . $code . "." . $fileExtension);

                    return $cvsPath . $fileName . "." . $fileExtension;
                }
            }
        }

        return null;
    }

    private function sendMail()
    {
        $postData = $this->getInputPostAsArray();
        $file = $this->salvarArquivo('cvs');
        $postData['Arquivo'] = $this->externalUrl($file);
        if (false == $this->mailSender->sendTrabalheConoscoEmail($postData)) {
            return $this->request->redirect('/trabalhe-conosco/erro');
        }

        return $this->request->redirect('/trabalhe-conosco/sucesso');
    }

    /**
     * @return array
     */
    private function getInputPostAsArray()
    {
        return filter_input_array(INPUT_POST);
    }

    public function externalUrl($path)
    {
        return $this->request->getContext()->getScheme() . '://' .
        $this->request->getContext()->getHost() .
        $this->request->getContext()->getBaseUrl() .
        '/' . $path;
    }
}
