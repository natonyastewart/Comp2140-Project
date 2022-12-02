<?php

include_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;





class Device{
    private $type;
    private $customerID;
    private $brand;
    private $modelNumber;
    private $description;
    private $category;
    private $repairStatus;
    private $technician;
    private $deviceID;
    private $cost;

    function __construct($type,$customerID,$brand,$modelNumber,$category,$repairStatus,$cost,$description,$technician)
    {
        $this->type = $type;
        $this->customerID = $customerID;
        $this->brand = $brand;
        $this->modelNumber = $modelNumber;
        $this->description = $description;
        $this->category = $category;
        $this->repairStatus = $repairStatus;
        $this->technician = $technician;
        $this->cost = $cost;
    }

    function addDevice(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $sql_check = "SELECT customer_id FROM device WHERE customer_id = '$this->customerID'" ;
                $result = mysqli_query($link,$sql_check);
                
                if ($result->num_rows > 0){
                    $sql_check = "UPDATE device SET customer_id = '$this->customerID',brand = '$this->brand',type = '$this->type', model_number = '$this->modelNumber', assigned_to = '$this->technician', category = '$this->category', repair_status = '$this->repairStatus', estimated_cost = '$this->cost', description = '$this->description' WHERE customer_id = '$this->customerID'" ;
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>Device updated successfully</h4>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                else{
                    $sql_check = "INSERT INTO device (customer_id, brand, type, model_number, assigned_to, category, repair_status, estimated_cost, description) VALUES
                    ('$this->customerID', '$this->brand', '$this->type', '$this->modelNumber', '$this->technician', '$this->category', '$this->repairStatus', '$this->cost', '$this->description')";
                
                    if (mysqli_query($link,$sql_check)) {
                        echo "<h4>Device added successfully</h4>";
                    } else {
                        echo "Error updating device: " . mysqli_error($conn);
                    }
                }
                
                
            }
            mysqli_close($link);
    }

    function alertCustomerByDeviceID(){
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'express';

            $link = mysqli_connect($host, $username, $password, $dbname);
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            else{
                $stmt = $link->prepare("SELECT email FROM customer WHERE id =?");
                $stmt->bind_param("s", $this->customerID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $email = $row['email'];
                if (empty($email)){
                    echo "Customer was not found.</script>";
                }
                else{
                    $mail = new PHPMailer(true);
                    $body;
                    if ($this->repairStatus == "Complete"){
                        $body = "Your device with model number: {$this->modelNumber} has been repaired and is ready to be collected.";
                    }else{
                        $body = "Your device with model number: {$this->modelNumber} has been added to the repair queue, you will be notified when the repair is complete.";
                    }

                    try {
                        $mail->isSMTP();                                            
                        $mail->Host       = 'smtp.gmail.com';                     
                        $mail->SMTPAuth   = true;                                   
                        $mail->Username   = 'expresscompdoctors@gmail.com';                     
                        $mail->Password   = 'dkfaytvlmtrqarkv';                               
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                        $mail->Port       = 465;                                   
                        $mail->setFrom('expresscompdoctors@gmail.com', 'ECD');
                        $mail->addAddress($email);
                        
                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Repair Notification';
                        $mail->Body    = $body;

                        $mail->send();
                        echo 'Message has been sent';
                    } 
                    catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                
            }
            mysqli_close($link);
    }
}

?>