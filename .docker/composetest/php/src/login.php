<?php
  include "dbConnection.php";
  session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Check if username is empty
   if(empty(trim($_POST["username"]))){
   echo "Please enter username.";
} else{
    $username = trim($_POST["username"]);
}

// Check if password is empty
if(empty(trim($_POST["password"]))){
    echo "Please enter your password.";
} else{
    $password = trim($_POST["password"]);
}


if(isset($username) && isset($password)){
     $connector = new Connector();

     $username = $connector->validateLogin($username, $password);
     if($username != "FAIL"){
        $_SESSION['username'] = $username;
       //header("Location: Views/userInfoView.php");
       header("Location: userInfo.php");
        } 
else{
    $_SESSION["loginError"] = TRUE;
    header("location: Views/loginView.php");
}}
    exit();
  }
  else {
    header("location: Views/loginView.php");
  }