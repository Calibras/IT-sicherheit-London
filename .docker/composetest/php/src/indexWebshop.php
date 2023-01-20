<?php
  include "dbConnection.php";
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $connector = new Connector();
     
     if(isset($_REQUEST['addItem'])) {
      $productname = $_POST["productName"]; 
      $productprice = $_POST["productPrice"];
      //$connector->addItem($productname, $productprice);
      $connector->saveAddItem($productname, $productprice);
      
    }
    else if(isset($_REQUEST['submit'])){
     $productname = $_POST["searchProduct"];
     $_SESSION["searchProduct"] = $productname;
     $_SESSION["products"] = $connector->savesearchForProduct($productname);
     //$_SESSION["products"] = $connector->searchForProduct($productname);
     //$_SESSION["products"] = $connector->searchForProductStoredProcedure($productname);
    }
    
     header("Location: Views/webshopView.php");
     exit();
  }else{
    
    header("Location: Views/webshopView.php");
    exit();
    //echo file_get_contents("Views/indexView.php");
  }
