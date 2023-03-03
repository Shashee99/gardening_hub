<?php

require_once APPROOT.'/libs/phpmailer/src/PHPMailer.php';
require_once APPROOT.'/libs/phpmailer/src/Exception.php';
require_once APPROOT.'/libs/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use  PHPMailer\PHPMailer\SMTP;


class Mailer{

    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }
    public function sendVerificationbyMail($username,$email,$verification_code)
    {

       $this->mail->isSMTP();
       $this->mail->Host = "smtp.gmail.com";
       $this->mail->SMTPAuth = true;
       $this->mail->Username = "gardeninghub.official@gmail.com ";
       $this->mail->Password = "pbiznliwdmdgpglh";
       $this->mail->SMTPSecure = "tls";
       $this->mail->Port = 587;

        // Email content
       $this->mail->setFrom("gardeninghub.official@gmail.com", "Gardening Hub");
       $this->mail->addAddress($email, $username);
       $this->mail->isHTML(true);
       $this->mail->Subject = "Verify Your Email Address";
       $this->mail->Body = "Please enter this verification code ".$verification_code;

       if($this->mail->send()){
           return true;
       }
       else{
           return false;
       }

    }


}