<?php
    $headers="From: Liavart <liavart21@gmail.com>\n";
    $headers.="MIME-Version: 1.0\n";
    $headers.="Content-type: text/html; charset=utf-8\n";
    $headers.="Content-transfer-Encoding: 8bit";
    //then, you can use the function mail($sendee, $subject, $content, $headers);
    function sendMailValidationCode($emailSendee, $subject, $content){
        global $headers;
        return mail($emailSendee, $subject, $content, $headers);
    }
?>