<pre>
<?php
/**
 * mail(to, subject, message, headers)
 * Send multiple same email to multiple emails
 * make sure do not set gap between From and : this becacuse of this you mail will not send
 * we can't put array on header, so we need to make it a simple string
 */

 $to = "bijoyhassan23@gmail.com, bijoyhassanoffice@gmail.com, bijoysaif23@gmail.com";
 $subject = "new Test mail";
 $message = "Hello, this is a test email sent by PHP";
 $header = [
    "MIME-Version: 1.0",
    "Content-type: text/plain; charset=utf-8",
    "From: test@gmail.com",
    "Cc: 2023100010014@seu.edu.bd",
    "Bcc: test@gmail.com"
];

$header = implode("\r\n", $header);

// if(mail($to, $subject, $message, $header)){
//     echo "Email sent successfully";
// }else{
//     echo "Failed to send email";
// }

echo $header;
?>
</pre>