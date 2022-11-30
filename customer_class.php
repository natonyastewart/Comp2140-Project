<?php

class Customer{
        private $fname;
		private $lname;
        private $phoneNumber;
        private $emailAddress;
        private $deviceID;
        private $balance;
        private $technician;
        private $admins = array("Joel Rhoden","Natonya Stewart","Ricardo Munda","Rayon Hart","Aalyah Johnson","Jusayne Chambers");
    
        function __construct($fname, $lname, $phoneNumber, $emailAddress, $deviceID, $balance, $technician){
            $this->fname = ucfirst($fname);
            $this->lname = ucfirst($lname);
            $this->phoneNumber = $phoneNumber;
            $this->emailAddress = $emailAddress;
            $this->deviceID = $deviceID;
           	$this->balance = $balance;
            $this->set_technician($this->admins,$technician);
        }

        function set_technician($adminL,$i){
            $this->technician = $adminL[(int)$i-1];
        }

        function updateDevice($deviceID){
            $this->deviceID = $deviceID;
        }
    
        function updateBalance($newBalance){
            $this->balance = $newBalance;
        }
    
        function get_fname(){
            return $this->fname;
        }
        function get_lname(){
            return $this->lname;
        }
        function get_email(){
            return $this->emailAddress;
        }
        function get_telephonenumber(){
            return $this->phoneNumber;
        }
        function get_technician(){
            return $this->technician;
        }

        function addCustomer(){
            $host = 'localhost';
            $username = 'admin';
            $password = 'password123';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT firstname, lastname, email FROM customer WHERE firstname = '$this->fname'" ;
                $result = mysqli_query($link,$sql_check);
                
                if ($result->num_rows == 1){
                    echo "<h4>Record already created.</h4>";
                }
                else{
                    $sql = "INSERT INTO customer (firstname, lastname, email, telephone, assigned_to) VALUES
                    ('$this->fname', '$this->lname', '$this->emailAddress', '$this->phoneNumber', '$this->technician')";

                    if(mysqli_query($link, $sql)){
                        echo "<h4>$this->fname was added successfully.</h4>";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                }
                
            }
            mysqli_close($link);
        }
    }
?>