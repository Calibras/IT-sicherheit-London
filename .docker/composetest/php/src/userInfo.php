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
*/
    $username = $_SESSION['username'];
    $user = $connector->getUser($username);
    #$user = $connector->loginUser($name, $password);
    $_SESSION["user"] = $user;
    header("Location: Views/userInfoView.php");
  }else{
    print("nicht angemeldet du hUnd !");
  }