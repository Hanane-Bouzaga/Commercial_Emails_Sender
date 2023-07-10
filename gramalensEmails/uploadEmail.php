<?php
session_start(); //lglssa

if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    if (isset($_FILES['email'])) {
        $errors = "";
        $file_name = $_FILES['email']['name'];
        $file_size = $_FILES['email']['size'];
        $file_tmp = $_FILES['email']['tmp_name'];
        $file_type = $_FILES['email']['type'];
        $temp = explode('.', $_FILES['email']['name']);
        $file_ext = strtolower(end($temp));

        $extensions = array("txt");

        if (in_array($file_ext, $extensions) === false) {
            $errors = "Extension not allowed, Please choose a txt file, <br> You can reupload a valid file.";
        }

        if ($file_size > 2097152) {
            $errors = 'File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ';
        }

        if ($errors == "") {
            move_uploaded_file($file_tmp, "Emails/" . $file_name);
            $count = 0;
            $myfile = fopen("Emails/$file_name", "r") or die("Unable to open file!");
            // Output one line until end-of-file
            while (!feof($myfile)) {
                fgets($myfile);
                $count++;
            }
            fclose($myfile);
            $_SESSION["emails-count"]=$count;
            $_SESSION["file-name-email"]=$file_name;

            header("Location: home.php?doneUploadEmail=true");
        
        } else {
            header("Location: home.php?errorUploadEmail=" . $errors);
        }
    } else {
        header("Location: home.php?errorUploadEmail=File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ");
    }
} else {
    header("Location: index.php");
    exit();
}



?>