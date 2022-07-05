<?php    
            require 'PHPMailer/class.phpmailer.php';
		    require 'PHPMailer/class.smtp.php';
            $mail = new PHPMailer();
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPDebug = 2;
            $mail->Mailer = "smtp";
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "naigo28@gmail.com"; // SMTP username
            $mail->Password = "terabithia27"; // SMTP password
            $mail->AddAddress("naigo28@gmail.com","Name");
            $mail->SetFrom("naigo28@gmail.com", "nailul");
            $mail->AddReplyTo("naigo28@gmail.com","nailul");
            $mail->Subject  = "This is a Test Message";
            $mail->Body     = "pesan";
            $mail->WordWrap = 50;
            if(!$mail->Send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
            } else {
            echo 'Message';
            }
?>