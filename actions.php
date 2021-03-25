<?php

isset($_POST['submit']) or die();

// collect form data
//$from = trim($_POST['from']);
$recipients = $_POST['recipients'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$recipientType = $_POST['recipient-type'];

// trigger wp_mail with email attributes
if ($recipients && $subject && $message && $recipientType) {

    $headers[] = "Content-Type: text/html; charset=\"" . get_option('blog_charset') . "\"\n";
    $headers[] = 'From: ' . get_option('blogname') . ' <' . get_bloginfo('admin_email') . ">\r\n";

    if ($recipientType == 'user') {
        $emails = explode(',', $recipients);
        foreach ($emails as $email) {
            wp_mail(trim($email), $subject, $message, $headers);
        }
    } else if ($recipientType == 'role') {
        $roles = explode(',', $recipients);
        foreach ($roles as $role) {
            $users = get_users(array('role' => $role));
            $emails = wp_list_pluck($users, 'user_email');
            foreach ($emails as $email) {
                wp_mail(trim($email), $subject, $message, $headers);
            }
        }
    }

    die('<div style="text-align: center"><p style="font-size: 1.2rem; color: green">Emails are sent successfully.</p></div>');
} else {
    die('<div style="text-align: center"><p style="font-size: 1.2rem; color: red">Required fields are empty!</p></div>');
}
