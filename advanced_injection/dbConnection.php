<?php

    class Connector{
        static $host = 'localhost';

        // Database use name
        static $user = 'root';

        //database user password
        static $pass = '';

        // database name
        static $mydatabase = 'MY_DATABASE';

        function search($id){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
             // select query
             $sql = 'SELECT user_msg.Msg FROM user_msg WHERE User_ID = '. $id;

             #print($sql);

             if ($result = $conn->query($sql)) {
                $user_msg[] = [];
                while ($data = $result->fetch_assoc()) {
                    $user_msg[] = $data;
                }
                array_shift($user_msg);
                return $user_msg;
            }
            
        }

        function searchForProduct($productname){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
             // select query
             $sql = 'SELECT Product_name, Price, Quantity FROM products WHERE product_name LIKE "%' . $productname. '%"';
             /*
             if ($result = $conn->query($sql)) {
                $products[] = [];
                while ($data = $result->fetch_assoc()) {
                    $products[] = $data;
                }
                array_shift($products);
                return $products;
            }*/
        }
    }
?>