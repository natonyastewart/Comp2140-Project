<?php

class UserLogin{

    private $username;
    private $password;

    function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    function isValidLogin(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=express", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $admins_sql = "SELECT * FROM users WHERE username = '{$this->username}' and password = '{$this->password}';";
            $result = $conn->query($admins_sql);
            $row = $result->rowCount();
            if ($row == 1){
                return TRUE;
            }
            else{
                return FALSE;
            }
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return FALSE;
        }

    }

}


?>