<?php
/**
 * Created by PhpStorm.
 * User: Javan
 * Date: 14.02.2017
 * Time: 15:19 Uhr
 */

function sendMail($to, $pSubject, $pMessage) {

    $subject = 'Preiswächter - ' . $pSubject;
    $from = 'amazon@javan.de';

    $message = '<html><body>';
    $message .= '<h1 style="color:#f40;">Hi!</h1>';
    $message .= '<p style="color:#080;font-size:18px;">' . $pMessage . '</p>';
    $message .= '</body></html>';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    // Sending email
    return mail($to, $subject, $message, $headers);
}