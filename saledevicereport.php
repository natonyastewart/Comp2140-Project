<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comp2140 Project</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href = "dashboard.css">
		<!-- <script src="device.js"></script> -->
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
					<h1>Sale Report</h1>
                    <?php

                        $con = new PDO("mysql:host=localhost;dbname=express",'root','');

                            
                            $sth = $con->prepare("SELECT * FROM `device` WHERE category = 'For Sale'");
                            

                            $sth->setFetchMode(PDO:: FETCH_OBJ);
                            $sth -> execute();

                            if($row = $sth->fetch())
                            {
                                ?>
                                    <?php 
                                        if(isset($_POST))
                                    ?>
                                <br><br><br>
                                <table>
                                    <tr>
                                        <th>Device ID</th>
                                        <th>CUSTOMER ID</th>
                                        <th>BRAND</th>
                                        <th>TYPE</th>
                                        <th>MODEL NUMBER</th>
                                        <th>ASSIGNED TO</th>
                                        <th>CATEGORY</th>
                                        <th>REPAIR STATUS</th>
                                        <th>ESTIMATED COST</th>
                                        <th>DESCRIPTION</th>

                                    </tr>
                                    <tr>
                                        <td><?php echo $row->id;?></td>
                                        <td><?php echo $row->customer_id; ?></td>
                                        <td><?php echo $row->brand; ?></td>
                                        <td><?php echo $row->type; ?></td>
                                        <td><?php echo $row->model_number; ?></td>
                                        <td><?php echo $row->assigned_to; ?></td>
                                        <td><?php echo $row->category; ?></td>
                                        <td><?php echo $row->repair_status; ?></td>
                                        <td><?php echo $row->estimated_cost; ?></td>
                                        <td><?php echo $row->description; ?></td>
                                        
                                    </tr>

                                </table>
                        <?php 
                            }
                                
                                
                                else{
                                    echo "No Reports Found.";
                                }


                        ?>

                    </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

