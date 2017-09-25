<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
    require 'vendor/autoload.php';


    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmessage = $_POST['cmessage'];

    echo $cname;
    echo $cemail;
    echo $cmessage;

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        
        //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;                               // Enable SMTP authentication

        //$mail->Username = 'user@example.com';                 // SMTP username
        //$mail->Password = 'secret';                           // SMTP password

        $mail->Username = 'jagatula007@gmail.com';                 // SMTP username
        $mail->Password = 'afnopasswordhalnus';                           // SMTP password

        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        //$mail->Port = 587;                                    // TCP port to connect to

        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($cemail, 'Mailer');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('jagatula007@gmail.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Contact From Detail';
        $mail->Body    = $cmessage;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail -> send())
            echo 'Message has been sent';
        else
            echo 'Something went wrong';
        
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>