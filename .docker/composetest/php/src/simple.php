<?php
  include "dbConnection.php";
  //session_destroy();
  #ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
  session_start();

  // define variables and set to empty values
  $nameErr = "";
  $name = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $id = $_POST["id"];
     $connector = new Connector();
     
     $_SESSION["id"] = $id;
     $_SESSION["msg"] = $connector->search($id);
     //$_SESSION["msg"] = $connector->saveSearch($id);

     header("Location: Views/simpleView.php");
     exit();
  }else{
    header("Location: Views/simpleView.php");
    exit();
  }
