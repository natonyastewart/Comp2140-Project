<?php session_start();
	$host = 'localhost';
	$username = 'admin';
	$password = 'password123';
	$dbname = 'express';


	$link_name = mysqli_connect('localhost', 'admin', 'password123', 'express');
	if($link_name === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$deviceInfo = $_REQUEST["deviceInfo"];
	$deviceArray = explode(",", $deviceInfo);


	if (isset($deviceInfo)){
		
		print_r($deviceArray);
		$customerId = $deviceArray[0];
		$brand = $deviceArray[1];
		$deviceType = $deviceArray[2];
		$modelNumber = $deviceArray[3];
		$assignedPerson = $deviceArray[4];
		$sql = "INSERT INTO device (customer_id, brand, type, model_number, assigned_to) VALUES
            ('$customerId', '$brand', '$deviceType', '$modelNumber', '$assignedPerson')";

		if(mysqli_query($link_name, $sql)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	
	mysqli_close($link_name);
		// print_r($customerId);

	}
