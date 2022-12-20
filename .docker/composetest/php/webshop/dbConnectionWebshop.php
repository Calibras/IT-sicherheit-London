<?php

    class Connector{
        static $host = 'db';

        // Database use name
        static $user = 'root';

        //database user password
        static $pass = 'Darius1998';

        // database name
        static $mydatabase = 'MY_DATABASE';

        function search($productname){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
             // select query
             $sql = 'SELECT Product_name, Price, Quantity FROM products WHERE product_name LIKE "%' . $productname. '%"';
             if ($result = $conn->query($sql)) {
                $products[] = [];
                while ($data = $result->fetch_assoc()) {
                    $products[] = $data;
                }
                array_shift($products);
                return $products;
            }
        }
        /** 
         * Sichereheit durch prepared statment 
        */
        function saveSearch($productname){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $sql = 'SELECT Product_name, Price, Quantity FROM products WHERE product_name LIKE %?%';
           // $sql = 'SELECT * FROM user_info WHERE First_Name = ?';
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $productname);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            //Das packen ins array ist dammit, falls mehree Elemente zurückkommen alles klappt
            $return = [];
            $return[] = $result;

            return $return;
        }

        /**
         * neues Product einfügen
         */
        function addItem($productname, $productprice) {
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $sql = 'INSERT INTO products(Product_name, Price) VALUES("' . $productname . '",' .$productprice.')';
            $conn->query($sql);

        }
    }
?>