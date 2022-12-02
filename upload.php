
<?php
require 'connections.php';
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'imgs/' . $newImageName);
      $query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'devicesforsale.php';
      </script>
      ";
    }
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
		</head>
	<body>
		<?php include 'header.php';?>
		
		<div class="container">
	
			<div class="back">
				<div class="buttons"> 
				<div><a href = "dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
          <div><a href="newcustomer.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>New Customer</a></div>
					<div><a href = "users.php"><i class="fa fa-users" aria-hidden="true"></i>Users</a></div>
					<div><a href = "viewPayment.php"><i class="fa fa-money" aria-hidden="true"></i>Payment</a></div>
					<div><a href = "devices.php"><i class="fa fa-laptop" aria-hidden="true"></i>Devices</a></div>
					<div><a href = "reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Reports</a></div>
					<hr>
					<div><a href = "home.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
				</div>
			</div>
            
            






            
			<div class="background">
				<div class="records">
					<h4>UPLOAD A NEW DEVICE</h4>
                                <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <label for="name">Name : </label>
                        <input type="text" name="name" id = "name" required value=""> <br>
                        <label for="image">Image : </label>
                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
                        <button type = "submit" name = "submit">Submit</button>
                        </form>
                        <br>
                       
                        <div><a href="DEVICESFORSALE.php"><i class="fa fa-EYE" ></i>VIEW DEVICES</a></div>
                    
                

                       
						
							</div>
						</div>
					</div>
				</div>


                
                    
					
					
				
			</div>
		</div>
	</body>
</html>
            
            




    
            