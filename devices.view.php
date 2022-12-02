<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<link rel="stylesheet" href = "dashboard.css">
		<!-- <script src="app.js?v=1"></script> -->
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
					<div class="top-button">
						<h1>Devices</h1>
						<div><a href="devicesearch.view.php"><i class="fa fa-search" aria-hidden="true"></i>Search Devices</a></div>
						<div><a href="newdevice.view.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Device</a></div>
						<div><a href="deletedevice.php"><i class="fa fa-minus" aria-hidden="true"></i>Remove Device</a></div>
						<div><a href="editdevice.php"><i class="fa fa-edit" aria-hidden="true"></i>Edit Device</a></div>
						<div><a href="devicesforsale.php"><i class="fa fa-money" aria-hidden="true"></i>Devices on Sale</a></div>
					</div>	
					
					<div class="record2">
						<div class="tables">
						<table>
							<thead>
								<tr>
									<th>Device ID</th>
									<th>Customer ID</th>
									<th>Brand</th>
									<th>Type</th>
									<th>Model Number</th>
									<th>Assigned To</th>
									<th>Category</th>
									<th>Repair Status</th>
									<th>Estimated Cost</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($device as $dev): ?>
								<tr>
									<td><?= $dev['id']; ?></td>
									<td><?= $dev['customer_id']; ?></td>
									<td><?= $dev['brand']; ?></td>
									<td><?= $dev['type']; ?></td>
									<td><?= $dev['model_number']; ?></td>
									<td><?= $dev['assigned_to']; ?></td>
									<td><?= $dev['category']; ?></td>
									<td><?= $dev['repair_status']; ?></td>
									<td><?= $dev['estimated_cost']; ?></td>
									<td><?= $dev['description']; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
