<?php
/**
 * mail(to, subject, message, headers)
 */

 $to = "bijoyhassan23@gmail.com";
 $subject = "Test mail";
 $message = "Hello, this is a test email sent by PHP";
 $from = "test@gmail.com";
 $header = "From : $from";

mail($to, $subject, $message, $header);
echo "mail send";
?>