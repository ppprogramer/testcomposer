<?php

namespace App\Controllers;

use Services\Mail;
use Services\View;

class BaseController
{
    protected $view;
    protected $mail;

    public function __construct()
    {

    }

    public function __destruct()
    {
        $view = $this->view;
        if ($view instanceof View) {
            if (!empty($view->data)) {
                extract($view->data);
            }
            require $view->view;
        }
        $mail = $this->mail;
        if ($mail instanceof Mail) {
            $mailer = new \Nette\Mail\SmtpMailer($mail->config);
            $mailer->send($mail);
        }
    }

}