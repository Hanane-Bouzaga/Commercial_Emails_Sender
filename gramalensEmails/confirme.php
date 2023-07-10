<?php
function redirect($url) {
    header('Location: '.$url);
    die();
}
session_start();
$code= $_POST["code"];
if(isset($_SESSION["code"])){
    if($_SESSION["code"]==$code){
        if($_SESSION["from-create-acc"]){ //ila jina mn create acc 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $data_base = "gramalens_emails";
            //jib les donnes mn l page dyal create account
            $email1= $_SESSION["email1"]; 
            $firstname1=  $_SESSION["firstname1"];
            $lastname1= $_SESSION["lastname1"];
            $password1=$_SESSION["password1"];
            // Create connection
            $con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
            $query = "INSERT INTO user (email_user,password_user,first_name,last_name) VALUES('$email1','$password1','$firstname1','$lastname1')";
            if (mysqli_query($con,$query)) {
                header("Location: index.php?done=true&info=Your Account Has Been Created!");
                mysqli_close($con); 
            }
        }
        if($_SESSION["from-forgot-pass"]){
            redirect("index.php?newpass=true");
            exit();
            
        }
    
    }
    else{
        header("Location: index.php?confirme=true&error=This Code Incorrect!");
    }
}


?>