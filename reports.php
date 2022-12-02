<?php
    $host = 'localhost';
	$username = 'root';
	$password = '';
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


    $statement = $conn->query("SELECT * FROM device WHERE category");
	$device = $statement->fetchAll(PDO::FETCH_ASSOC);
 

    require 'reports.view.php';