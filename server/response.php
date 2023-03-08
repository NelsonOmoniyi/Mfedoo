<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();

include_once("libs/dbfunctions.php");
// include_once("class/fee.php");
// $fee = new fee();

// $dbobject = new dbobject();

try {
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.ruachr.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'info@ruachr.com';                 
    $mail->Password   = 'Zenith2208Admi';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;  
  
    $mail->setFrom('info@ruachr.com', 'Fee Payment Test');           
    $mail->addAddress('omoniyinelson6@gmail.com');
    //$mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Fee Payment';
    $mail->Body    = 'Hello, this is nelson';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    // var_dump($mail);
    // exit;
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
