<?php

    class Connector{
        static $host = 'db';

        // Database use name
        static $user = 'root';

        //database user password
        static $pass = 'Darius1998';

        // database name
        static $mydatabase = 'MY_DATABASE';

        const SAFE = false;

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
             $sql = 'SELECT First_Name, Last_Name, DoB FROM user_info WHERE First_Name = "' . $productname. '";';
             if ($result = $conn->query($sql)) {
                $products[] = [];
                while ($data = $result->fetch_assoc()) {
                    $products[] = $data;
                }
                array_shift($products);
                return $products;
            }
        }

        function bulshit($string){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $sql = "SELECT * FROM user_msg WHERE user_msg.Msg_ID = ". $string. ";"; #1 AND SLEEP(5)=0;
            $conn->query($sql);
        }


        function getUserNameFromId($id){
            $sql = 'SELECT user_login.Username FROM user_login WHERE user_login.User_ID = ?';
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            //Das packen ins array ist dammit, falls mehree Elemente zur??ckkommen alles klappt

            return $result["Username"];
        }

        function getUserInfo($userName){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $sql = "SELECT * FROM `user_info` WHERE user_info.First_Name = '". $userName. "'";
            if ($result = $conn->query($sql)) {
                $userInfo[] = [];
                while ($data = $result->fetch_assoc()) {
                    $userInfo[] = $data;
                }
                array_shift($userInfo);
                return $userInfo;
            }
        }

        /** 
         * Sichereheit durch prepared statment 
        */
        function saveSearch($id){
            $conn = new mysqli(Connector::$host, Connector::$user, Connector::$pass, Connector::$mydatabase);
            $sql = 'SELECT * FROM user_msg WHERE User_ID = ?';
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            //Das packen ins array ist dammit, falls mehree Elemente zur??ckkommen alles klappt
            $return = [];
            $return[] = $result;

            return $return;
        }
    }
?>