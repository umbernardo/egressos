<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 09/12/16
 * Time: 15:12
 */

namespace Egressos\Application\Controller;


use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Egressos\Application\Validator\Factory\UsuarioValidatorFactory;
use League\Plates\Engine;
use PDO;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

class CadastroController
{
    /**
     * @var RequestManager
     */
    private $requestManager;
    /**
     * @var Engine
     */
    private $templateEngine;
    /**
     * @var ObjectMapper
     */
    private $dataHelper;
    /**
     * @var Validator
     */
    private $usuarioValidator;
    /**
     * @var PDO
     */
    private $pdo;


    /**
     * CadastroController constructor.
     * @param RequestManager $requestManager
     * @param Engine $templateEngine
     * @param ObjectMapper $dataHelper
     * @param Validator $usuarioValidator
     * @param PDO $pdo
     */
    public function __construct(
        RequestManager $requestManager,
        Engine $templateEngine,
        ObjectMapper $dataHelper,
        Validator $usuarioValidator,
        PDO $pdo
    )
    {
        $this->requestManager = $requestManager;
        $this->templateEngine = $templateEngine;
        $this->dataHelper = $dataHelper;
        $this->usuarioValidator = $usuarioValidator;
        $this->pdo = $pdo;
    }

    public function actionCadastrar()
    {
        if ($this->requestManager->isPostRequest()) {
            return $this->efetuarCadastro();
        }

        return $this->templateEngine->render('site::cadastrar', array(
            'campus' => $this->dataHelper->listar('campus')->registros,
            'titulacoes' => $this->dataHelper->listar('titulacao')->registros,
            'cursos' => $this->dataHelper->listar('cursos')->registros,
        ));
    }


    private function efetuarCadastro()
    {
        $usuario = $this->getUsuarioFromPost();

        //Valida se já é um usuário existente
        $usrJaExistente = reset($this->dataHelper->listar('usuario', '', 1, 1,
            'where email="' . $usuario['email'] . '"')->registros);
        if (false == empty($usrJaExistente)) {
            return $this->templateEngine->render('site::cadastrar', array(
                'campus' => $this->dataHelper->listar('campus')->registros,
                'titulacoes' => $this->dataHelper->listar('titulacao')->registros,
                'cursos' => $this->dataHelper->listar('cursos')->registros,
                'mensagens' => array(
                    'O usuario com email ' . $usuario['email'] . ' já está cadastrado em nosso banco de dados.',
                ),
                'usuario' => $usuario
            ));
        }

        //Valida o formulário
        try {
            $this->usuarioValidator->assert($usuario);
        } catch (NestedValidationException $exception) {
            $mensagens = $exception->findMessages(UsuarioValidatorFactory::getMessages());
            return $this->templateEngine->render('site::cadastrar', array(
                'campus' => $this->dataHelper->listar('campus')->registros,
                'titulacoes' => $this->dataHelper->listar('titulacao')->registros,
                'cursos' => $this->dataHelper->listar('cursos')->registros,
                'mensagens' => $mensagens,
                'usuario' => $usuario
            ));
        }

        //Tenta salvar
        try {
            $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `password`, `telefone`, `id_campus`, `id_titulacao`, `id_curso`, `ano_entrada`, `ano_conclusao`, `ra`, `ordem`, `ativo`) 
VALUES (NULL, :nome, :email, :password, :telefone, :campus, :titulacao, :curso, :ano_entrada, :ano_conclusao, :ra, '0', 'Sim');";
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->pdo->prepare($sql);
            foreach ($usuario as $key => $value) {
                $query->bindValue($key, $value);
            }
            $query->execute();
        } catch (\Exception $exception) {
            return $this->templateEngine->render('site::cadastrar', array(
                'campus' => $this->dataHelper->listar('campus')->registros,
                'titulacoes' => $this->dataHelper->listar('titulacao')->registros,
                'cursos' => $this->dataHelper->listar('cursos')->registros,
                'mensagens' => array(
                    'Ocorreu um erro ao inserir seu cadastro. Por favor tente novamente.',
                    $exception->getMessage()
                ),
                'usuario' => $usuario
            ));
        }

        return $this->templateEngine->render('site::cadastro-sucesso');
    }

    /**
     * @return array
     */
    private function getUsuarioFromPost()
    {
        return filter_input_array(
            INPUT_POST,
            array(
                'nome' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_STRING,
                'password' => FILTER_SANITIZE_STRING,
                'telefone' => FILTER_SANITIZE_STRING,
                //'trabalhando' => FILTER_SANITIZE_STRING,
                //'receber_feed' => FILTER_SANITIZE_STRING,

                'campus' => FILTER_SANITIZE_NUMBER_INT,
                'titulacao' => FILTER_SANITIZE_NUMBER_INT,
                'curso' => FILTER_SANITIZE_NUMBER_INT,
                'ano_entrada' => FILTER_SANITIZE_NUMBER_INT,
                'ano_conclusao' => FILTER_SANITIZE_NUMBER_INT,

                'ra' => FILTER_SANITIZE_STRING,
            )
        );
    }

}
