<?php
  include "dbConnection.php";
  session_start();
  
  #stuff aus der url übernehmen und schecken


  

  $stuff = true;
  if(isset($_SESSION['username'] )){
  //if(isset($_GET["id"]) && isset($_GET["password"])){
    $connector = new Connector();
    
    /*
    $id = $_GET["id"];
    $password = $_GET["password"];
    $name = $connector->getUserNameWihtId($id);

    $user = $connector->loginUser($name, $password);    #relevant für Second order!
    */
    $username = $_SESSION['username'];
    $user = $connector->getUser($username);
    $_SESSION["user"] = $user;
    header("Location: Views/userInfoView.php");
  }else{
    print("nicht angemeldet du hUnd !");
    
  }

  /*
      $username = $_SESSION['username'];
    $user = $connector->getUser($username);
    $_SESSION["user"] = $user;
  */

