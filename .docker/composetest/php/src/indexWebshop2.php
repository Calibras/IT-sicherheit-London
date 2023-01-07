<?php
  include "dbConnection.php";
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $connector = new Connector();
/*     
    $url = $_SERVER['REQUEST_URI'];
    //echo $url;
    $url_components = parse_url($url);
    parse_str($url_components['query'], $parameters);
    $productname = $parameters['searchProduct'];
*/
    $productname = $_GET["searchProduct"];
    $_SESSION["searchProduct"] = $productname;
    //$_SESSION["products"] = $connector->savesearchForProduct($productname);
    $_SESSION["products"] = $connector->searchForProduct($productname);
    
    
     header("Location: Views/webshop2.php");
     exit();
  }else{
    echo "No Input";
    //header("Location: Views/webshop2.php");
    exit();
    //echo file_get_contents("Views/indexView.php");
  }
