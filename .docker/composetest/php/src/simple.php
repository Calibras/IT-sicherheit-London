<?php
  include "dbConnection.php";
  session_start();

  // define variables and set to empty values
  $nameErr = "";
  $name = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $id = $_POST["id"];
     $connector = new Connector();
     
     $_SESSION["id"] = $id;
     $_SESSION["msg"] = $connector->search($id);

     header("Location: Views/simpleView.php");
     exit();
  }else{
    header("Location: Views/simpleView.php");
    exit();
  }
