<?php
    $host = 'localhost';
	$username = 'admin';
	$password = 'password123';
	$dbname = 'express';

    try {
        $conn = new PDO(
            'mysql:host=' . $host . ';dbname=' . $dbname,
            $username,
            $password
        );
    } catch (Exception $e) {
        die($e->getMessage());
    }


    $statement = $conn->query("SELECT * FROM device");
	$device = $statement->fetchAll(PDO::FETCH_ASSOC);
 

    require 'devices.view.php';

