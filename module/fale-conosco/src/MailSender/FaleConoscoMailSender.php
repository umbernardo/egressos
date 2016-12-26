<?php
/**
 * Created by PhpStorm.
 * User: Ricardo Bernardo
 * Date: 17/11/2015
 * Time: 09:50
 */

namespace Egressos\FaleConosco\MailSender;


use Egressos\Mailer\MailSender\Exception\MailSendFailedException;
use League\Plates\Engine;
use PHPMailer;
use stdClass;

final class FaleConoscoMailSender
{
    /**
     * @var Engine
     */
    private $engine;
    /**
     * @var PHPMailer
     */
    private $mailer;
    /**
     * @var stdClass
     */
    private $siteInfo;


    /**
     * @param Engine $engine
     * @param PHPMailer $mailer
     * @param stdClass $siteInfo
     */
    function __construct(Engine $engine, PHPMailer $mailer, stdClass $siteInfo)
    {
        $this->engine = $engine;
        $this->mailer = $mailer;
        $this->siteInfo = $siteInfo;
    }

    public function sendFaleConoscoEmail(array $data)
    {
        try {
            $this->mailer->addAddress($this->siteInfo->email_contato);
            $this->mailer->Subject = 'Contato através do site';

            $this->engine->addData(array(
                'dados' => $data,
                'subject',
            ));

            $this->mailer->Body = $this->engine->render('mailer::default');

            return $this->mailer->send();
        } catch (MailSendFailedException $e) {
            return false;
        }
    }
}
