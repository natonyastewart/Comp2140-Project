<?php session_start();
	require("customer_class.php");

	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['deviceID']) && isset($_POST['estCost']) && isset($_POST['assigned-to'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$deviceID = $_POST['deviceID'];
		$estCost = $_POST['estCost'];
		$technician = $_POST['assigned-to'];

		$customer = new Customer($fname,$lname,$telephone,$email,$deviceID,$estCost,$technician);
		$customer->addCustomer();
	}

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="dashboard.css">
		<script src="Newcustomer.js"></script>
		</head>
	<body>
		<?php include 'header.php';?>
		<div class="container">
			<div class="back">
				<div class="buttons">
				<div><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcustomer.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Customer</a></div>
					<div><a href="processorder.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Process Orders</a></div>
					<div><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i>Users</a></div>
					<div><a href="payment.php"><i class="fa fa-money" aria-hidden="true"></i>Payment</a></div>
					<div><a href="devices.php"><i class="fa fa-laptop" aria-hidden="true"></i>Devices</a></div>
					<div><a href="reports"><i class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a></div>
					<hr>
					<div><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
				<div class="records">
					<h1>New Customer</h1>
					<div class="record2">
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							<div class="cell">	
								<label for="title">Title</label><br>
								<select id="title" name="title">
									<option value="Mr.">Mr</option>
									<option value="Mrs.">Mrs</option>
									<option value="Ms.">Ms</option>
								</select>
							</div>
							<div class="table">
								<div class="cell">
									<label for="fname">First Name</label>
									<input type="text" name="fname" id="fname" required/>
								</div>
								<div class="cell">
									<label for="lname">Last Name</label>
									<input type="text" name="lname" id="lname" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" required/>
								</div>
								<div class="cell">
									<label>Telephone</label>
									<input type="text" name="telephone" id="telephone" required/>
								</div>
							</div>
                            <div class="table">
								<div class="cell">
									<label for="deviceID">Device ID</label>
									<input type="text" name="deviceID" id="deviceID" required/>
								</div>
								<div class="cell">
									<label>Estimated Cost</label>
									<input type="text" name="estCost" id="balance" required/>
								</div>
							</div>
							<div class="cell">
								<label for="assigned-to">Assigned To</label><br>
								<select id="assigned-to" name="assigned-to">
									<option value="1">Joel Rhoden</option>
									<option value="2">Natonya Stewart</option>
									<option value="3">Ricardo Munda</option>
									<option value="4">Rayon Hart</option>
									<option value="5">Aalyah Johnson</option>
									<option value="6">Jusayne Chambers</option>
								</select>
							</div><br>
							<div class="save-button">
								<button type="submit" id="save">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
