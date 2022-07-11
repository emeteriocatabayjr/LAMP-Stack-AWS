<?php include ('includes/connection.php');?>
<?php include 'includes/header.php'; ?>
<?php include ('includes/sessionstart.php');?>
<div class="wrapper">
    <div id="content">
        <div class="container">  
            <h3 align="center">User Accounts</h3>  
            <div class="table-responsive">
                <br />
                <div id="employee_table">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Full Name</th>  
                            <th>Age</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM tbl_users ORDER BY id ASC";
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                          ?>
                            <tr>
                                <td><?php echo $row["fullname"]; ?></td>
                                <td><?php echo $row["age"]; ?></td>
                                <td><?php echo $row["location"]; ?></td>
    
                                <td class="text-center">
                                    <input type="button" name="update" value="update" id="<?php echo $row["id"]; ?>" class="btn mb-1 btn-success update_data" />
                                    <input type="button" name="delete" value="delete" id="<?php echo $row["id"]; ?>" class="btn mb-1 btn-danger delete_data" />
                                </td>
                            </tr>
                        <?php
                            }
                            ?>
                    </table>
                </div>
            </div>
            <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#add_data_Modal" class="btn btn-warning">Add Account</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User Account</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Full Name</span>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Age</span>
                        <input type="text" name="age" id="age" class="form-control" placeholder="Enter Age">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Location</span>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location">
                    </div>
                    <div class="btn-group d-flex " role="group">
                        <button type="submit" name="insert" id="insert" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
            </div>
            <div class="modal-body" id="employee_detail">

            </div>
        </div>
    </div>
</div>
<div id="delete_dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
            </div>
            <div class="modal-body" id="delete_employee_detail">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        $('#insert_form').on("submit", function(event){ 
            event.preventDefault();  
            if($('#firstname').val() == ""){  
                alert("Name is required");  
            }  
            else if($('#lastname').val() == ''){  
                alert("Address is required");  
            }  
            else if($('#username').val() == ''){  
                alert("Designation is required");  
            }
   
            else{  
                $.ajax({  
                    url:"insert.php",  
                    method:"POST",  
                    data:$('#insert_form').serialize(),  
                    beforeSend:function(){  
                        $('#insert').val("Inserting");  
                    },  
                    success:function(data){  
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#employee_table').html(data);  
                    }  
                });  
            }  
        });
    });
    $(document).on('click', '.delete_data', function(){
        var employee_id = $(this).attr("id");
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:{employee_id:employee_id},
            success:function(data){
                $('#delete_employee_detail').html(data);
                $('#delete_dataModal').modal('show');
            }
        });
    });
    
    $(document).on('click', '.update_data', function(){
            var employee_id = $(this).attr("id");
            $.ajax({
                url:"update.php",
                method:"POST",
                data:{employee_id:employee_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        });

</script>
<script src="css/Bootstrap v5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>