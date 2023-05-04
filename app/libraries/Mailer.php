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
       $this->mail->Username = "gardeninghub.official@gmail.com";
       $this->mail->Password = "pgdylriyrvtkzbrj";
       $this->mail->SMTPSecure = "tls";
       $this->mail->Port = 587;
        $verification_url = URLROOT.'/users/verify';
        // Email content
       $this->mail->setFrom("gardeninghub.official@gmail.com", "Gardening Hub");
       $this->mail->addAddress($email, $username);
       $this->mail->isHTML(true);
        $this->mail->Subject = 'Verification Code';
        $this->mail->Body    = 'Dear ' .'sir/madam'. ',<br><br>'
            . 'Thank you for choosing our service. This email is to inform you that a verification code has been generated for your account. However, please note that this email address is not monitored and we cannot respond to any replies to this email.<br><br>'
            . 'Please use the following link along with the verification code provided below to complete the verification process:<br><br>'
            . 'Verification Code: ' . $verification_code . '<br><br>'
            . 'Verification URL: <a href="' . $verification_url . '">' . 'click here.'. '</a><br><br>'
            . 'If you did not request this verification code, please ignore this email and take appropriate security measures to protect your account.<br><br>'
            . 'Thank you for your cooperation.<br><br>'
            . 'Best regards,<br>'
            . '[Gardening Hub Team]';

       if($this->mail->send()){
           return true;
       }
       else{
           return false;
       }

    }

    public function sendverificationforpwreset($username,$email,$verification_code)
    {

        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "gardeninghub.official@gmail.com";
        $this->mail->Password = "pgdylriyrvtkzbrj";
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = 587;
        $password_reset_url = URLROOT.'/users/passwordchange/'.$email;
        // Email content
        $this->mail->setFrom("gardeninghub.official@gmail.com", "Gardening Hub");
        $this->mail->addAddress($email, $username);
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Password Reset Code';
        $this->mail->Body    =  'Dear ' .'sir/madam'. ',<br><br>'
            . 'We received a request to reset your account password. Please use the following verification code to proceed:<br><br>'
            . 'Verification Code: ' . $verification_code . '<br><br>'
            . 'Please enter the verification code on the password reset page:<br><br>'
            . 'If you did not request a password reset, please ignore this email and take appropriate security measures to protect your account.<br><br>'
            . 'Thank you for choosing our service.<br><br>'
            . 'Best regards,<br>'
            . '[Gardening Hub Team]';
        if($this->mail->send()){
            return true;
        }
        else{
            return false;
        }

    }

    public function sendDeclinedRegistrationEmail($username, $email, $reason) {
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "gardeninghub.official@gmail.com";
        $this->mail->Password = "pgdylriyrvtkzbrj";
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = 587;

        // Email content
        $this->mail->setFrom("gardeninghub.official@gmail.com", "Gardening Hub");
        $this->mail->addAddress($email, $username);
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Registration Declined';
        $this->mail->Body = 'Dear ' . $username . ',<br><br>'
            . 'We regret to inform you that your registration has been declined for the following reason: ' . $reason . '.<br><br>'
            . 'If you believe this decision was made in error, please contact our support team for assistance.<br><br>'
            . 'Thank you for considering our service.<br><br>'
            . 'Best regards,<br>'
            . '[Gardening Hub Team]';

        if($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendUserDeletingMessage($username, $email, $reason) {
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "gardeninghub.official@gmail.com";
        $this->mail->Password = "pgdylriyrvtkzbrj";
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = 587;

        // Email content
        $this->mail->setFrom("gardeninghub.official@gmail.com", "Gardening Hub");
        $this->mail->addAddress($email, $username);
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Account Deletion Notification';
        $this->mail->Body = 'Dear ' . $username . ',<br><br>'
            . 'We regret to inform you that your account has been deleted from our system for the following reason: ' . $reason . '.<br><br>'
            . 'If you believe this decision was made in error, please contact our support team for assistance.<br><br>'
            . 'Thank you for using our service.<br><br>'
            . 'Best regards,<br>'
            . '[Gardening Hub Team]';

        if($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }



}