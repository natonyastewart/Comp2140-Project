<?php

class Customer{
        private $fname;
		private $lname;
        private $phoneNumber;
        private $emailAddress;
        private $technician;
    
        function __construct($fname, $lname, $phoneNumber, $emailAddress, $technician){
            $this->fname = ucfirst($fname);
            $this->lname = ucfirst($lname);
            $this->phoneNumber = $phoneNumber;
            $this->emailAddress = $emailAddress;
            $this->technician = $technician;
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

        function get_customerID(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM customer WHERE firstname = '$this->fname'" ;
                $result = mysqli_query($link,$sql_check);
                
                if ($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    return $row['id'];
                }
                else{
                    return -1;
                }
                
            }
            mysqli_close($link);
        }

        function addCustomer(){
            
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT id FROM customer WHERE firstname = '$this->fname'AND lastname = '$this->lname'" ;
                $result = mysqli_query($link,$sql_check);

                if ($result->num_rows == 1){
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
    
                    $sql_check = "UPDATE customer SET firstname = '$this->fname',lastname = '$this->lname',email = '$this->emailAddress', telephone = '$this->phoneNumber', assigned_to = '$this->technician' WHERE id = '$id'" ;
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>Customer updated successfully</h4>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }

                        
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