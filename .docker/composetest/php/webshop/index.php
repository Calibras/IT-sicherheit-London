<?php
  include "dbConnectionWebshop.php";

  
  session_start();


  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connector = new Connector();

    if(isset($_REQUEST['addItem'])) {
      $productname = $_POST["productName"]; 
      $productprice = $_POST["productPrice"];
      $_SESSION["addproduct"] = $connector->addItem($productname, $productprice);
    }
    else {
    $productname = $_POST["searchProduct"];
     
     $_SESSION["searchProduct"] = $productname;
     $_SESSION["products"] = $connector->search($productname);
     //$_SESSION["products"] = $connector->saveSearch($productname);
    }

     header("Location: Views/webshop.php");
     exit();
    
  }else{
    header("Location: Views/webshop.php");
    exit();
    //echo file_get_contents("Views/indexView.php");
  }
