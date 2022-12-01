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
					<h1>Search Devices</h1>
					<div class="record2">

                        <form method="post">
                            <label> Search by Model Number: </label>
                            <input type="text" name="search">
                            <input type="submit" name="submit">
                        </form>

						
						


                    <div>
                    <?php

                        $con = new PDO("mysql:host=localhost;dbname=express",'root','');

                        if (isset($_POST["submit"])) {
                            $str = $_POST["search"];
                            
                            $sth = $con->prepare("SELECT * FROM `device` WHERE model_number = '$str'");
                            

                            $sth->setFetchMode(PDO:: FETCH_OBJ);
                            $sth -> execute();

                            if($row = $sth->fetch())
                            {
                                ?>
                                <br><br><br>
                                <table>
                                    <tr>
                                        <th>MODEL NUMBER</th>
                                        <th>CUSTOMER ID</th>
                                        <th>BRAND</th>
                                        <th>TYPE</th>

                                    </tr>
                                    <tr>
                                        <td><?php echo $row->model_number; ?></td>
                                        <td><?php echo $row->customer_id; ?></td>
                                        <td><?php echo $row->brand; ?></td>
                                        <td><?php echo $row->type; ?></td>
                                    </tr>

                                </table>
                        <?php 
                            }
                                
                                
                                else{
                                    echo "Model Number Not Found!";
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

