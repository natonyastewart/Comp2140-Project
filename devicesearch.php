<!DOCTYPE html>
<html>
<head>
	<title>Device Search</title>

</head>
<body>

<form method="post">
<label> Search by Model Number </label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>



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
			echo "Model Number not found";
		}


}

?>








