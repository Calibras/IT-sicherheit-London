<?php
include "../dbConnection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1,h2{
            text-align: center;
            color: solid black;
        }
        table{
            margin-left:auto;
            margin-right:auto;
        }
        tr{
            font-size: 20px;
        }
        p{
            text-align: center;
        }
    </style>
</head>


<body>
        
        <br>
        <h1> Webshop </h1>
        <br>
        <br>

    <form method="get">
        <p> Search: 
        <input type="text" id="searchProduct" name="searchProduct" size="75"> 
        <input type="submit" value="Search" name="submit" >
    </form>
        <br><br>

        <h2>Products</h2>
        <br>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_REQUEST['searchProduct'])) {
      
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
        }
          


            if(isset($_SESSION["searchProduct"])){
            if($_SESSION["searchProduct"] != NULL){

            $products = $_SESSION["products"];

            if($products != NULL) {

                        echo "<table BORDER =2>" ;
            echo "<tr>";
                echo "<th>Product </th> <th>Price</th> <th>Quantity</th>";
            echo "</tr>";
            
    
                for($i = 0; $i < count($products); $i++){
                    echo "<tr>";
                        echo "<td>" . $products[$i]["Product_name"]. "</td>";
                        echo "<td>" . $products[$i]["Price"]. "</td>";
                        echo "<td>" . $products[$i]["Quantity"]. "</td>";
                        echo "</tr>";
                }
            echo "</table>" ;
            } else echo "Product not found";
           
            }   
            }
       ?>

       
    </body>
</html>