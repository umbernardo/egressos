<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 13/12/16
 * Time: 17:21
 */

namespace Egressos\Application\Controller;

use Cupcake\ObjectMapper\ObjectMapper;
use Cupcake\Request\RequestManager;
use Egressos\Application\Manager\UserManager;
use League\Plates\Engine;

class OportunidadesController extends CredentialsRequiredController
{
    /**
     * @var Engine
     */
    private $templateEngine;
    /**
     * @var ObjectMapper
     */
    private $objectMapper;

    /**
     * OportunidadesController constructor.
     * @param Engine $templateEngine
     * @param UserManager $userManager
     * @param RequestManager $requestManager
     * @param ObjectMapper $objectMapper
     */
    public function __construct(
        Engine $templateEngine,
        UserManager $userManager,
        RequestManager $requestManager,
        ObjectMapper $objectMapper
    )
    {
        $this->templateEngine = $templateEngine;
        $this->objectMapper = $objectMapper;
        return parent::__construct($userManager, $requestManager);
    }

    /**
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function actionOportunidades($id = 0)
    {
        $campus = $this->objectMapper->ver('campus', $id);
        $oportunidades = $this->getOportunidadesFromCampus($campus);
        return $this->templateEngine->render('site::oportunidades', [
            'usuario' => $this->getUserManager()->getUsuarioLogado(),
            'oportunidades' => $oportunidades,
            'campus' => $campus,
            'listaCampus' => $this->getListaCampus(),
        ]);
    }

    /**
     * @param $campus
     * @return mixed
     */
    private function getOportunidadesFromCampus($campus)
    {
        return $this->objectMapper->listar('oportunidades', '', 1, 0,
            'where ativo = "Sim" and id_campus = ' . $campus->id)->registros;
    }

    private function getListaCampus()
    {
        return $this->objectMapper->listar('campus')->registros;
    }
}
