<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 09:51
 */

namespace Egressos\TrabalheConosco\MailSender\Factory;


use Cupcake\Service\ServiceManager;
use Egressos\TrabalheConosco\MailSender\TrabalheConoscoMailSender;
use League\Plates\Engine;
use PHPMailer;
use stdClass;

final class TrabalheConoscoMailSenderFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return TrabalheConoscoMailSenderFactory
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

        return new TrabalheConoscoMailSender($engine, $mailer, $config);
    }
}
