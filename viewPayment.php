<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<link rel="stylesheet" href = "dashboard.css">
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
						<h1>Payment Management</h1>
						<div><a href="paymentsearch.php"><i class="fa fa-search" aria-hidden="true"></i>Search by Customer ID</a></div>
						<div><a href="editpayment.php"><i class="fa fa-edit" aria-hidden="true"></i>Edit Payment</a></div>
						<div><a href="deletepayment.php"><i class="fa fa-minus" aria-hidden="true"></i>Delete Payment</a></div>
					</div>	

				
					
					<div class="record2">
						<div class="tables">
                    <?php 
					$host = 'localhost';
					$username = 'root';
					$password = '';
					$dbname = 'express';
					
					$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
					$stmt = $conn->query("SELECT * FROM payment");
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
					?>
						
                        <table>
							<thead>
								<tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Balance</th>
                                <th>Amount Paid</th>
                                <th>Remaining Balance</th>
								</tr>
							</thead>
							<tbody>
                                
								<?php foreach ($results as $row): ?>
								<tr>
									<td><?= $row['paymentid']; ?></td>
									<td><?= $row['customer_id']; ?></td>
									<td><?= $row['balance']; ?></td>
									<td><?= $row['amount_paid']; ?></td>
									<td><?= $row['remaining_balance']; ?></td>	
                                    </form>
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




