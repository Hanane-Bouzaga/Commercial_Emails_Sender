<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


session_start();
$email= $_POST['forgotpass-email'];

function redirect($url) {
    header('Location: '.$url);
    die();
}
$servername = "localhost";
$username = "root";
$password = "";
$data_base = "gramalens_emails";
// Create connection
$con = mysqli_connect($servername,$username,$password,$data_base);
$query = "SELECT * FROM user where email_user='$email'";
if ($result = mysqli_query($con,$query ))//execition sir waji lbase donner 
{
    
    $row = $result -> fetch_assoc();
    if($row != null){
        //hna imken lih ibdel mot pass
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "gramalens@gmail.com";
        $mail->Password   = "nhcdppskwhjghvqs";
        $mail->IsHTML(true);
        $mail->AddAddress($row["email_user"], $row["first_name"] ." ".$row["last_name"]);
        $mail->SetFrom("gramalens@gmail.com", "gramalens");
        $mail->Subject = "Verification Code";
        $code=rand(100000,999999);
        $content = "Your Verification Code is :  <b>".$code."</b>";
        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
        } else {
            $_SESSION["code"]=$code;
            $_SESSION["from-create-acc"]=false;
            $_SESSION["from-forgot-pass"]=true;
            $_SESSION["email1"]=$email;
            redirect("index.php?confirme=true");
        
        }

    }
    else{
        //ila makant ga3 compte f bd
        redirect("index.php?error=This Email Doesn't Have An Account!&frgpass=true");

        
    } 


}

mysqli_close($con);
?>