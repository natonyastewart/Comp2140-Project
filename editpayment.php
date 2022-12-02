<?php session_start();
	require_once("payment_class.php");

	if (isset($_POST['customerID']) && isset($_POST['balance']) && isset($_POST['amountpaid'])){
		$customerID = $_POST['customerID'];
		$balance = $_POST['balance'];
		$amountpaid = $_POST['amountpaid'];
        $payment = new Payment($customerID,$balance,$amountpaid);
        $payment->addPayment();
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
					<div><a href = "viewPayment.php"><i class="fa fa-money" aria-hidden="true"></i>Payment</a></div>
					<div><a href="devices.php"><i class="fa fa-laptop" aria-hidden="true"></i>Devices</a></div>
					<div><a href = "reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a></div>
					<hr>
					<div><a href = "home.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>	
			<div class="background">
				<div class="records">
					<h1>Edit Payment</h1>
					<div class="record2">
						<!-- <form method="post" id="form" onsubmit="popup()" action="addcontact.php">  -->
							<form method = "post" action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
							<div class="table">
								<div class="cell">
									<label for="customerID">Customer ID</label>
									<input type="text" name="customerID" id="customerID" required/>
								</div>
							</div>
							<div class="table">
								<div class="cell">
									<label for="balance">Balance</label>
									<input type="text" name="balance" id="balance" required/>
								</div>
							</div>
                            <div class="table">
								<div class="cell">
									<label for="amountpaid">Amount Paid</label>
									<input type="text" name="amountpaid" id="amountpaid" required/>
								</div>
							</div>
							<br>
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