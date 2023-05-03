<?php
include"PHPMailer/src/PHPMailer.php";
include"PHPMailer/src/Exception.php";
//include"PHPMailer/src/OAuth.php";
include"PHPMailer/src/POP3.php";
include"PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{

//print_r($mail);
    public function dathangmail($title,$content){
        $mail = new PHPMailer(true); 
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'duonghp0934@gmail.com';                 // SMTP username
            $mail->Password = 'vflegmiwssdasmyc';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('duonghp0934@gmail.com', 'DangDuongshop');
            $mail->addAddress('dangduong0127@gmail.com', 'Dang Duong');     // Add a recipient
            //$mail->addAddress($email,$fullname);               // Name is optional
            //$mail->addReplyTo($email, 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
         
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    public function dathangmailcomplete($email,$fullname,$clienttitle,$client_content){
        $mail = new PHPMailer(true); 
        $mail->CharSet = 'UTF-8';
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'duonghp0934@gmail.com';                 // SMTP username
            $mail->Password = 'vflegmiwssdasmyc';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('duonghp0934@gmail.com', 'DangDuongshop');
            $mail->addAddress($email, $fullname);     // Add a recipient
            //$mail->addAddress($email,$fullname);               // Name is optional
            //$mail->addReplyTo($email, 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
         
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $clienttitle;
            $mail->Body    = $client_content;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>