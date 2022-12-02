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
					<h1>Search Payment</h1>
					<div class="record2">

                        <form method="post">
                            <label> Search by Customer ID: </label>
                            <input type="text" name="search">
                            <input type="submit" name="submit">
                        </form>

						
						


                    <div>
                    <?php

                        $con = new PDO("mysql:host=localhost;dbname=express",'root','');

                        if (isset($_POST["submit"])) {
                            $str = $_POST["search"];
                            
                            $sth = $con->prepare("SELECT * FROM `payment` WHERE customer_id = '$str'");
                            

                            $sth->setFetchMode(PDO:: FETCH_OBJ);
                            $sth -> execute();

                            if($row = $sth->fetch())
                            {
                                ?>
                                <br><br><br>
                                <table>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Customer ID</th>
                                        <th>Balance</th>
                                        <th>Amount Paid</th>
                                        <th>Remaining Balance</th>

                                    </tr>
                                    <tr>
                                        <td><?php echo $row->paymentid; ?></td>
                                        <td><?php echo $row->customer_id; ?></td>
                                        <td><?php echo $row-> balance; ?></td>
                                        <td><?php echo $row-> amount_paid; ?></td>
                                        <td><?php echo $row-> remaining_balance; ?></td>
                                    </tr>

                                </table>
                        <?php 
                            }
                                
                                
                                else{
                                    echo "CUSTOMER NOT FOUND!";
                                }


                        }

                        ?>

                    </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

