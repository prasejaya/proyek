<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PHPMailer extends CI_Controller {

    function test_mail() {
        $config = Array(
            'protocol' => 'SMTP',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'fajarsuharimoerti@gmail.com',
            'smtp_pass' => 'suhari93',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline'   => "\r\n"               
        );

        $this->load->library('email', $config);
        
        $mail = $this->email;

        $mail->from('fajarsuharimoerti@gmail.com', 'Itats KP');
        $mail->to('prasejaya@gmail.com');
        
        $mail->subject('Mail Test');
        $mail->message('Testing the mail class dari codeigniter.');
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->print_debugger();
        } else {
            echo "Message sent!";
        }
    }

}
