<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>