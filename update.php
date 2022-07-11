<?php include ('includes/connection.php');?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="POST" action="uprec.php">
    <?php 
    //select.php  
    if(isset($_POST["employee_id"]))
    {
     $output = '';
     $query = "SELECT * FROM tbl_users WHERE id = '".$_POST["employee_id"]."'";
     $result = mysqli_query($connect, $query);
     $output .= '  
          <div class="table-responsive">  
               <table class="table table-bordered">';
        while($row = mysqli_fetch_array($result))
        {
         $output .= '
                <input type="text" name="emp" id="emp" value="'.$row["id"].'" hidden />

                    <div class="input-group mb-3">
                        <span class="input-group-text">First Name</span>
                        <input type="text" name="newfullname"  id="newfullname" class="form-control" value="'.$row["fullname"].'" /> 
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Last Name</span>
                        <input type="text" name="newage" id="newage" class="form-control" value="'.$row["age"].'" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Username</span>
                        <input type="text" name="newlocation" id="newlocation" class="form-control" value="'.$row["location"].'" />
                    </div>
         ';
        }
       
        echo $output;
    }

    ?>
        <div class="btn-group d-flex " role="group">
            <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</body>
</html>