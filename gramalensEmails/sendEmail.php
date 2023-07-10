<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

session_start(); //lglssa

if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    if (isset($_SESSION["file-name-email"]) and isset($_SESSION["file-name-message"])) {
        $file_name_emails = $_SESSION["file-name-email"];
        $file_name_message = $_SESSION["file-name-message"];
        echo "<script>window.location.assign('home.php')</script>";
        $myfile = fopen("Emails/$file_name_emails", "r");
        // Output one line until end-of-file
        $count1=0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $split = explode(" ", $line);
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            $mail->Username = "gramalens@gmail.com";
            $mail->Password = "nhcdppskwhjghvqs";
            $mail->IsHTML(true);
            $mail->AddAddress($split[0], $split[1] . " " . $split[2]);
            $mail->SetFrom("gramalens@gmail.com", "gramalens");
            $mail->Subject = "Email from GramaLens";
            $file_name_emails = $_SESSION["file-name-email"];
            $myfile1 = fopen("message/$file_name_message", "r");
            // Output one line until end-of-file
            $content = "";
            while (!feof($myfile1)) {
                $content .= fgets($myfile1);
            }
            fclose($myfile1);
            $mail->MsgHTML($content);
            if (!$mail->Send()) {
                var_dump($mail);
            }
            else{
                $count1++;
            }

        }
        fclose($myfile);
        $_SESSION["sent-email"]=$count1;



    } else {
        header("Location: home.php");

    }
} else {
    header("Location: index.php");
    exit();
}




?>