<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol']  = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_user'] = 'promodevweb@gmail.com';
$config['smtp_pass'] = 'tetris2020';
$config['smtp_port'] = 465;
$config['charset']   = 'utf-8';
$config['mailtype']  = 'html';
$config['newline']   = "\r\n";
/*
        //Mail settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.live.fr';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'mail@domain.com'; // Your email address
        $config['smtp_pass'] = 'mailpassword'; // Your email account password
        $config['mailtype'] = 'html'; // or 'text'
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE; //No quotes required
        $config['newline'] = "\r\n"; //Double quotes required
*/

?>