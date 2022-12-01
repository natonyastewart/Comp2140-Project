<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="dashboard.css">
		<script src="newdevice.js"></script>
		<!-- <script src="devicevalidation.js"></script> -->
		</head>
	<body>
		<?php include 'header.php';?>
		
		<div class="container">
	
			<div class="back">
				<div class="buttons">
				<div><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
					<div><a href="newcustomer.html"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Customer</a></div>
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
					<h1>New Device</h1>
					<div class="record2">
						
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
						<form id = "myform"  method="post" novalidate >
							<!-- <div class="table"> -->
								<!-- <div class="cell">
									<label for="deviceId">Device ID</label>
									<input type="text" name="deviceId" id="deviceId" required/>
								</div> -->
								<div class="cell">
									<label for="customerId">Customer ID <em>(Required)</em></label>
									<input type="text" name="customerId" placeholder="e.g. 1234" id="customerId" required>
								</div>
								<div class="cell">
									<label for="brand">Brand <em>(Required)</em></label>
									<input type="text" name="brand" placeholder="e.g. Apple" id="brand" required/>
								</div>
								<div class="cell">
									<label for = "deviceType">Type <em>(Required)</em></label>
									<input type="text" name="deviceType" placeholder="e.g. Mobile Device" id="deviceType" required/>
								</div>

								<div class="cell">
									<label for = "deviceType">Type <em>(Required)</em></label><br>
									<select id="deviceType" name="deviceType">
										<option value="LAPTOP">LAPTOP</option>
										<option value="CELLPHONE">PHONE</option>
										<option value="TABLET">TABLET</option>
										<option value="CONSOLE">GAMING DEVICE</option>
				
									</select>							
								<div class="cell">
									<label for="modelNumber">Model Number <em>(Required)</em></label>
									<input type="text" name="modelNumber" placeholder="e.g. A2650" id="modelNumber" required/>
								</div>
				
							
								<div class="cell">
									<label for="assignedPerson">Assigned To</label><br>
									<select id="assignedPerson" name="assignedPerson">
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
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>