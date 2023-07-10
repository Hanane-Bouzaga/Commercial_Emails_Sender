<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


session_start();
$firstname= $_POST['firstname-ca'];
$lastname= $_POST['lastname-ca'];
$email= $_POST['email-ca'];
$password= $_POST['password-ca'];


function redirect($url) {
    header('Location: '.$url);
    die();
}
$servername = "localhost";
$username = "root";
$password = "";
$data_base = "gramalens_emails";
//jib les donnes mn l page dyal create account
$email1= $_POST['email-ca']; 
$firstname1= $_POST['firstname-ca'];
$lastname1= $_POST['lastname-ca'];
$password1= $_POST['password-ca'];
// Create connection
$con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
$query = "SELECT * FROM user where email_user='$email1'";
if ($result = mysqli_query($con,$query )) 
{
    
    $row = $result -> fetch_assoc();
    if($row != null){

        $_SESSION["email1"]= $email1;
        $_SESSION["password1"]=$password1;
        $_SESSION["firstname1"]=$firstname1;
        $_SESSION["lastname1"]=$lastname1;
        header("Location: index.php?error=This Email Already Have An Account");
        exit();

    }
    else{
        //hna nta9lo lmar7ala li b3dha nsiftoo lih lcode l gmail dyalo 
        
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
        $mail->AddAddress($email1, $firstname1 ." ".$lastname);
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
            $_SESSION["email1"]= $email1;
            $_SESSION["password1"]=$password1;
            $_SESSION["firstname1"]=$firstname1;
            $_SESSION["lastname1"]=$lastname1;

            $_SESSION["from-create-acc"]=true;
            $_SESSION["from-forgot-pass"]=false;

            redirect("index.php?confirme=true");
        
        }



    } 


}

mysqli_close($con);
?>