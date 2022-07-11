 <?php include ('includes/connection.php');?>
 <?php
 $empid = $_POST["emp"];
 $fullname = $_POST["newfullname"];
 $age = $_POST["newage"]; 
 $location = $_POST["newlocation"]; 

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$sql = "UPDATE tbl_users SET fullname='$fullname', age='$age', location='$location' WHERE id='$empid'";
if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">'; 
		echo 'alert("Record updated successfully");'; 
		echo 'window.location.href = "index.php";';
		echo '</script>';       
} else {
    echo "Error updating record: " . mysqli_error($connect);
}
mysqli_close($connect);
?>