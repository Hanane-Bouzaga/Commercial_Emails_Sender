<?php
session_start(); //lglssa
if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    if (isset($_FILES['image'])) {
        $errors = "";
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $temp = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($temp));

        $extensions = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($file_ext, $extensions) === false) {
            $errors = "Extension not allowed, Please choose a image file, <br> You can reupload a valid file.";
        }

        if ($file_size > 2097152) {
            $errors = 'File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ';
        }

        if ($errors == "") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $data_base = "gramalens_emails";
            $con = mysqli_connect($servername,$username,$password,$data_base); //sqlconnection
            $imgContent = addslashes(file_get_contents($file_tmp));
              // Insert image content into database 
            $email= $_SESSION["email"];
            $query = "UPDATE user SET image='$imgContent' WHERE email_user='$email'"; 
            if(mysqli_query($con,$query)){
                mysqli_close($con);   
            }
            header("Location: home.php?doneUpload=true");
        } else {
            header("Location: home.php?errorUpload=" . $errors);
        }
    } else {
        header("Location: home.php?errorUpload=File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ");
    }
} else {
    header("Location: index.php");
    exit();
}

?>