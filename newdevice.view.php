<?php session_start();

	require_once("device_class.php");

	if (isset($_POST["customerId"]) && isset($_POST["brand"]) && isset($_POST["deviceType"]) && isset($_POST["modelNumber"]) && isset($_POST["assignedPerson"]) && isset($_POST["category"]) && isset($_POST["repair_status"]) && isset($_POST["estimated_cost"]) && isset($_POST["description"])){
		
		$customerId = $_POST["customerId"];
		$brand = $_POST["brand"];
		$deviceType = $_POST["deviceType"];
		$modelNumber = $_POST["modelNumber"];
		$category = $_POST["category"];
		$repair_status = $_POST["repair_status"];
		$estimated_cost = $_POST["estimated_cost"];
		$description = $_POST["description"];
		$assignedPerson = $_POST["assignedPerson"];

		if (empty($customerId) || empty($brand) || empty($deviceType) || empty($modelNumber) || empty($category) || empty($repair_status) || empty($estimated_cost) || empty($description) || empty($assignedPerson)){
			echo"All fields must be filled";
		}
		else{
			$device = new Device($deviceType,$customerId,$brand,$modelNumber,$category,$repair_status,$estimated_cost,$description,$assignedPerson);
			$device->addDevice();
			$device->alertCustomerByDeviceID();
		}

	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href = "dashboard.css">
		<script src="newdevice.js"></script>
		<!-- <script src="devicevalidation.js"></script> -->
		</head>
	<body>
		<?php include 'header.php';?>
		
		<div class="container">
	
			<div class="back">
				<div class="buttons">
				<div><a href = "dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcustomer.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Customer</a></div>
					<div><a href = "viewPayment.php"><i class="fa fa-money" aria-hidden="true"></i>Payment</a></div>
					<div><a href="devices.php"><i class="fa fa-laptop" aria-hidden="true"></i>Devices</a></div>
					<div><a href = "reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a></div>
					<hr>
					<div><a href = "home.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
				<div class="records">
					<h1>New Device</h1>
					<div class="record2">
						<form id = "myform"  method="post" >
								<div class="cell">
									<label for="customerId">Customer ID <em>(Required)</em></label>
									<input type="text" name="customerId" placeholder="e.g. 1234" id="customerId" required>
								</div>
								<div class="cell">
									<label for="brand">Brand <em>(Required)</em></label>
									<input type="text" name="brand" placeholder="e.g. Apple" id="brand" required/>
								</div>
								<div class="cell">
									<label for = "deviceType">Type <em>(Required)</em></label><br>
									<select id="deviceType" name="deviceType">
										<option value="LAPTOP">LAPTOP</option>
										<option value="CELLPHONE">PHONE</option>
										<option value="TABLET">TABLET</option>
										<option value="CONSOLE">GAMING DEVICE</option>
									</select>	
								</div>
													
								<div class="cell">
									<label for="modelNumber">Model Number <em>(Required)</em></label>
									<input type="text" name="modelNumber" placeholder="e.g. A2650" id="modelNumber" required/>
								</div>
								<div class="cell">
									<label for="assignedPerson">Assigned To <em>(Required)</em></label>
									<select id="assignedPerson" name="assignedPerson">
										<option value="Joel Rhoden">Joel Rhoden</option>
										<option value="Natonya Stewart">Natonya Stewart</option>
										<option value="Ricardo Munda">Ricardo Munda</option>
										<option value="Rayon Hart">Rayon Hart</option>
										<option value="Aalyah Johnson">Aalyah Johnson</option>
										<option value="Jusayne Chambers">Jusayne Chambers</option>
									</select>
								</div>
								<div class="cell">
									<label for="category">Category <em>(Required)</em></label>
									<select id="category" name="category">
										<option value="For Repair">For Repair</option>
										<option value="For Sale">For Sale</option>
									</select>
								</div>
								<div class="cell">
									<label for="repair_status">Repair Status <em>(Required)</em></label>
									<select id="repair_status" name="repair_status">
										<option value="Complete">Complete</option>
										<option value="Incomplete">Incomplete</option>
									</select>
								</div>
								<div class="cell">
									<label for="estimated_cost">Estimated Cost <em>(Required)</em></label>
									<input type="text" name="estimated_cost" placeholder="e.g. 1500" id="estimated_cost" required/>
								</div>
								<div class="cell">
									<label for="description">Description <em>(Required)</em></label>
									<input type="text" name="description" id="description" required/>
								</div><br>
								<div class="save-button">
									<button type="submit" id="save">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>