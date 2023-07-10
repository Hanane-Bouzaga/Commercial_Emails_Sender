<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$data_base = "gramalens_emails";
//jib les donnes mn l page dyal create account
$email1= $_SESSION["email1"]; 
$newpass= $_POST["new-pass"];
// Create connection
$con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
$query = "UPDATE user SET password_user='$newpass' WHERE email_user='$email1'";
if (mysqli_query($con,$query)) {
    header("Location: index.php?done=true&info=Your password has been changed!");
    mysqli_close($con); 
}


?>