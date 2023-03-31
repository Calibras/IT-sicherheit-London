<?php
  include "dbConnection.php";
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $productname = $_POST["searchProduct"];
     $connector = new Connector();
     
     $_SESSION["searchProduct"] = $productname;
     $_SESSION["products"] = $connector->searchForProduct($productname);
     
     header("Location: Views/webshopView.php");
     exit();
  }else{
    session_destroy();
    header("Location: Views/webshopView.php");
    
    exit();
  }
