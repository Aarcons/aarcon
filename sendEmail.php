<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['emailid'])) {
        $name = $sendername;
        $email = $_POST['emailid'];
        $subject = $mailsubject;
        $body = $mailbody;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->SMTPAuth = false;
        //$mail->Username = "info@aarcons.com";
        //$mail->Password = 'Immu1234*';
        //$mail->SMTPDebug = 1;                 
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25; //587
        //$mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('gssneemuch@gmail.com', $name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "New OTP sent to Email!";
            
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        //exit(json_encode(array("status" => $status, "response" => $response)));
       //  exit("<SCRIPT LANGUAGE='JavaScript'>
       //     window.alert('$response')
       //     window.location.href='cand-dashboard.php'
           
       // </SCRIPT>");



    }
?>
