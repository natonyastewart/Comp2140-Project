<?php session_start();

	if (isset($_POST['deviceID'])){
		$deviceID = $_POST['deviceID'];
		$host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'express';

        $link = mysqli_connect($host, $username, $password, $dbname);
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        else{
            $sql_check = "DELETE FROM device WHERE id = '$deviceID'" ;
            
            if (mysqli_query($link,$sql_check)) {
                echo "<h4>Record deleted successfully</h4>";
                } else {
                echo "Error delete record: " . mysqli_error($conn);
                }
            
        }
        mysqli_close($link);
	}

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href = "dashboard.css">
		<script src="Newcustomer.js"></script>
		</head>
	<body>
		<?php include 'header.php';?>
		<div class="container">
			<div class="back">
				<div class="buttons">
				<div><a href = "dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcustomer.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Customer</a></div>
					<div><a href = "users.php"><i class="fa fa-users" aria-hidden="true"></i>Users</a></div>
					<div><a href = "viewPayment.php"><i class="fa fa-money" aria-hidden="true"></i>Payment</a></div>
					<div><a href="devices.php"><i class="fa fa-laptop" aria-hidden="true"></i>Devices</a></div>
					<div><a href="reports"><i class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a></div>
					<hr>
					<div><a href = "home.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
				<div class="records">
					<h1>Delete Device</h1>
					<div class="record2">
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							<div class="table">
								<div class="cell">
									<label for="deviceID">Device ID associated with customer</label>
									<input type="text" name="deviceID" id="deviceID" required/>
								</div>
							</div>
							<br>
							<div class="save-button">
								<button type="submit" id="save">Delete</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>