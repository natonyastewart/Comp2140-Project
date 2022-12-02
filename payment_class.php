<?php

class Payment{

    private $customerID;
    private $balance;
    private $amountpaid;
    private $remainingbalance;

    function __construct($customerID,$balance,$amountpaid){
        $this->customerID = $customerID;
        $this->balance = $balance;
        $this->amountpaid = $amountpaid;
        $this->update_balance();
    }

    function get_balance(){
        return $this->balance;
    }
    function update_balance(){
        $this->balance -= $this->amountpaid;
        $this->remainingbalance = $this->balance;
    }
    function addPayment(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT paymentid FROM payment WHERE customer_id = '$this->customerID'" ;
                $result = mysqli_query($link,$sql_check);
                
                if ($result->num_rows > 0){
                    $sql_check = "UPDATE payment SET balance = '$this->balance',amount_paid = '$this->amountpaid',remaining_balance = '$this->remainingbalance' WHERE customer_id = '$this->customerID'" ;
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>Payment updated successfully</h4>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                else{
                    $sql_check = "INSERT INTO payment (customer_id, balance, amount_paid, remaining_balance) VALUES
                    ('$this->customerID', '$this->balance', '$this->amountpaid', '$this->remainingbalance')";
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<script>console.log('Record updated successfully')</script>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                
                
            }
            mysqli_close($link);
    }

}

?>