
<?php
//insert.php  
include 'connection.php';
if(!empty($_POST))
{
    $fullname = mysqli_real_escape_string($connect, $_POST["fullname"]);  
    $age = mysqli_real_escape_string($connect, $_POST["age"]);  
    $location = mysqli_real_escape_string($connect, $_POST["location"]);  

    $query = "INSERT INTO tbl_users(fullname, age, location) VALUES('$fullname', '$age', '$location')";

    if(mysqli_query($connect, $query))
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Record added successfully");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';       
    }else {
        echo "Error updating record: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}
else{
    alert('test');
}
?>
