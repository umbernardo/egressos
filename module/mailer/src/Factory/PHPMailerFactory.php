<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 05/11/2015
 * Time: 15:20
 */

namespace Egressos\Mailer\Factory;


use Cupcake\Service\ServiceManager;
use PHPMailer;

class PHPMailerFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return PHPMailer
     * @throws \Cupcake\Service\Exception\ContainerException
     * @throws \Cupcake\Service\Exception\NotFoundException
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        $config = $serviceManager->get('ConfigManager')->get('mailer');

        $mail = new PHPMailer(true);
        if ($config['isSMTP']) {
            $mail->SMTPDebug = $config['SMTPDebug'];
            $mail->isSMTP();
            $mail->Host = $config['Host'];
            $mail->SMTPAuth = $config['SMTPAuth'];
            $mail->Username = $config['Username'];
            $mail->Password = $config['Password'];
            if (isset($config['SMTPSecure'])) {
                $mail->SMTPSecure = $config['SMTPSecure'];
            }
            $mail->Port = $config['Port'];
        } else {
            $mail->isMail();
        }
        $mail->From = $config['From'];
        $mail->FromName = $config['FromName'];

        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);

        return $mail;
    }
}
