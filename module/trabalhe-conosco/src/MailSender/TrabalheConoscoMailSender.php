<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 17/11/2015
 * Time: 09:50
 */

namespace Egressos\TrabalheConosco\MailSender;


use Egressos\Mailer\MailSender\Exception\MailSendFailedException;
use League\Plates\Engine;
use PHPMailer;
use stdClass;

final class TrabalheConoscoMailSender
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

    public function sendTrabalheConoscoEmail(array $data)
    {
        try {
            $this->mailer->addAddress($this->siteInfo->email_cv);
            $this->mailer->Subject = 'Novo CV enviado através do site';

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
