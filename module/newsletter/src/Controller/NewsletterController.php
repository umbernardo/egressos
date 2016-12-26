<?php
namespace Egressos\Newsletter\Controller;

use Cupcake\Messenger\FlashMessenger;
use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Cupcake\Url\UrlGenerator;
use League\Plates\Engine;
use PDO;

/**
 * @author Ricardo Bernardo
 */
class NewsletterController
{
    /**
     * @var Engine
     */
    private $tempateEngine;
    /**
     * @var RequestManager
     */
    private $requestManager;
    /**
     * @var ObjectMapper
     */
    private $dataHelper;
    /**
     * @var FlashMessenger
     */
    private $flashMessenger;
    /**
     * @var PDO
     */
    private $db;
    /**
     * @var UrlGenerator
     */
    private $urlGenerator;


    /**
     * NewsletterController constructor.
     * @param Engine $tempateEngine
     * @param RequestManager $requestManager
     * @param ObjectMapper $dataHelper
     * @param FlashMessenger $flashMessenger
     * @param PDO $db
     * @param UrlGenerator $urlGenerator
     */
    public function __construct(
        Engine $tempateEngine,
        RequestManager $requestManager,
        ObjectMapper $dataHelper,
        FlashMessenger $flashMessenger,
        PDO $db,
        UrlGenerator $urlGenerator
    ) {
        $this->tempateEngine = $tempateEngine;
        $this->requestManager = $requestManager;
        $this->dataHelper = $dataHelper;
        $this->flashMessenger = $flashMessenger;
        $this->db = $db;
        $this->urlGenerator = $urlGenerator;
    }

    public function actionSalvarNewsletter()
    {
        if ($this->requestManager->isPostRequest() &&
            $this->salvarNewsletter($this->getDataFromPost('email'), $this->getDataFromPost('nome'))
        ) {
            return $this->requestManager->redirect($this->urlGenerator->generateUrl(array('newsletter', 'sucesso')));
        }

        return $this->requestManager->redirect($this->urlGenerator->generateUrl(array('newsletter', 'erro')));
    }

    /**
     * @param $email
     * @param string $nome
     * @return bool
     * @throws \Exception
     */
    public function salvarNewsletter($email, $nome = '')
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->flashMessenger->adicionarMensagemErro('Email "' . $email . '" não é um e-mail válido');

            return false;
        }

        $dados = $this->dataHelper->retornoRegistroPadrao('tbl_sys_newsletter', '', 1, 0,
            ' where email like "' . $email . '"', 'id');
        if (false == empty($dados['registros'])) {
            $this->flashMessenger->adicionarMensagemErro('Email já cadastrado em nosso banco de dados');

            return false;
        }
        if (false !== $this->db->query("INSERT INTO  `tbl_sys_newsletter` (`id` ,`nome` ,`email`) VALUES (NULL ,  '" . utf8_decode($nome) . "',  '" . $email . "');")) {
            return true;
        }

        $this->flashMessenger->adicionarMensagemErro('Ocorreu um erro e seu email não foi cadastrado em nosso banco de dados');

        return false;
    }

    public function actionSucesso()
    {
        return $this->tempateEngine->render('newsletter::sucesso');
    }

    public function actionErro()
    {
        return $this->tempateEngine->render('newsletter::error', array(
            'messenger' => $this->flashMessenger,
        ));
    }

    /**
     * @param $variableName
     * @return mixed
     */
    private function getDataFromPost($variableName)
    {
        return filter_input(INPUT_POST, $variableName);
    }

}
