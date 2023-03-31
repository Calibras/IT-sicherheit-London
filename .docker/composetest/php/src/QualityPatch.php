<?php
  include "dbConnection.php";
  #ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
  session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $connector = new Connector();
     
     if(isset($_REQUEST['addItem'])) {
        $quality = $_POST["quality"]; 
        $connector->updateQuantity($quality, $name);
    }
    else {
     $productname = $_POST["searchProduct"];
     $_SESSION["searchProduct"] = $productname;
     $_SESSION["products"] = $connector->samSearchForProduct($productname);
    }
    
     header("Location: qualityPatchView.php");
     exit();
  }else{
    
    header("Location: qualityPatchView.php");
    exit();
  }