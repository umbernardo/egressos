<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 09:51
 */

namespace Egressos\FaleConosco\MailSender\Factory;


use Cupcake\Service\ServiceManager;
use Egressos\FaleConosco\MailSender\FaleConoscoMailSender;
use League\Plates\Engine;
use PHPMailer;
use stdClass;

final class FaleConoscoMailSenderFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return FaleConoscoMailSenderFactory
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        /** @var PHPMailer $mailer */
        $mailer = $serviceManager->get('PHPMailer');

        /** @var stdClass $dataHelper */
        $config = $serviceManager->get('DataHelper')->ver('sys_config');

        /** @var Engine $engine */
        $engine = $serviceManager->get('Renderer');

        return new FaleConoscoMailSender($engine, $mailer, $config);
    }
}
