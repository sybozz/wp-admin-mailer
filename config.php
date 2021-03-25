<?php
add_action('phpmailer_init', 'phpmailer_config');

function phpmailer_config($phpmailer)
{
    if (!is_object($phpmailer)) {
        $phpmailer = (object)$phpmailer;
    }

    $phpmailer->Mailer = 'smtp';
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USER;
    $phpmailer->Password = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = get_option('blogname');
}