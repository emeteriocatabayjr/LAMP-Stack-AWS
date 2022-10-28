<?php
$connect = mysqli_connect("localhost", "root", "<password>", "db_lamp-crud-aws");
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}
?>