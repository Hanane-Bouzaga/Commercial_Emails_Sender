<?php
   session_start();//lglssa

   if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])  ){
      if(isset($_FILES['message'])){
         $errors="";
         $file_name = $_FILES['message']['name'];
         $file_size =$_FILES['message']['size'];
         $file_tmp =$_FILES['message']['tmp_name'];
         $file_type=$_FILES['message']['type'];
         $temp=explode('.',$_FILES['message']['name']);
         $file_ext=strtolower(end($temp));
         
         $extensions= array("html","txt");
         
         if(in_array($file_ext,$extensions)=== false){
            $errors="Extension not allowed, Please choose a html or txt file, <br> You can reupload a valid file.";
         }
         
         if($file_size > 2097152){
            $errors='File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ';
         }
         
         if($errors==""){
            $_SESSION["path"]="message/".$file_name;
            move_uploaded_file($file_tmp,"message/".$file_name);
            $_SESSION["file-name-message"]=$file_name;
            header("Location: home.php?doneUpload=true");
         }else{
            header("Location: home.php?errorUpload=".$errors);
         }
      }
      else{
         header("Location: home.php?errorUpload=File size must be excately 2 MB,More than that is not allowed, <br> You can reupload a valid file. ");
      }
   }
   else{
      header("Location: index.php");
      exit();
   }
   
?>