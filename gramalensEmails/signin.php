<?php
session_start();
function redirect($url) {
    header('Location: '.$url);
    die();
}
$servername = "localhost";
$username = "root";
$password = "";
$data_base = "gramalens_emails";

// Create connection
$con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
$email1= $_POST['email1']; //3rdaaaaaaas hhhh
$password1= $_POST['password1'];
$query = "SELECT * FROM user where email_user='$email1'";
$_SESSION["email"]=$email1;
$_SESSION["password"]=$password1;

if ($result = mysqli_query($con,$query )) 
{
    $row = $result -> fetch_assoc();
    if($row != null){
        if($row["password_user"]== $password1){
            $_SESSION["email"]=$row["email_user"];
            $_SESSION["password"]=$row["password_user"];
            $_SESSION["firstname"]=$row["first_name"];
            $_SESSION["lastname"]=$row["last_name"];

            redirect("http://localhost/gramalensEmails/home.php");
        }
        else{
            redirect("index.php?error=Password sign in invalid");
            exit();
        }


    }
    else{
        header("Location: index.php?error=Email sign in invalid");
        exit();

    } 

   
}

  mysqli_close($con);


?>