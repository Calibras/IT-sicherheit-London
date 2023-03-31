<?php
  include "dbConnection.php";
  session_start();
  if(isset($_SESSION['username'] )){
    $connector = new Connector();

    $username = $_SESSION['username'];
    $user = $connector->getUser($username);
    $_SESSION["user"] = $user;
    header("Location: Views/userInfoView.php");
  }else{
    print("Sie sind nicht angemeldet!");
    
  }

