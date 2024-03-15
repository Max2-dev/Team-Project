<?php

$db_host = 'localhost';
$db_name = 'shop_db'; 
$username = 'root';
$password = '';


try {
    //connect to MySQL database club on localhost by default username/password 
	$conn = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 
    //set various DB connection properties
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
	echo("<p style='text-align:center;color:red'>Failed to connect to the database.</p><br>");
	echo($ex->getMessage());
	;
}
?>