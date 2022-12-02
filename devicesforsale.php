<?php
require 'connections.php';
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
					<h1>Devices for Sale</h1>
                    <div><a href="upload.php"><i class="fa fa-upload" aria-hidden="true"></i>Upload a New Device</a></div>

                    <div class="record2">
                       
                        
						<div class="tables">
						<table border = 1 cellspacing = 0 cellpadding = 10>
						 <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
      </tr>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC")
      ?>
<?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td> <img src="imgs/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>
      <?php endforeach; ?>
						
							</div>
						</div>
					</div>
				</div>


                
                    
					
					
				
			</div>
		</div>
	</body>
</html>





   

    

