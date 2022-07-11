<?php
$connect = mysqli_connect("localhost", "root", "jkGkbKnDyew1", "db_lamp-crud-aws");
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}
?>