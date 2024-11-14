<?php

    include_once('connectdb.php');

    $insertdata = new DB_con();

    if (isset($_POST['insert'])){
        $users_id_card = $_POST['users_id_card'];
        $users_firstname = $_POST['users_firstname'];
        $users_lastname = $_POST['users_lastname'];
        $users_email = $_POST['users_email'];
        $users_phonenumber = $_POST['users_phonenumber'];
        $users_detail_date = $_POST['users_detail_date'];
        $users_address = $_POST['users_address'];
        
        $sql = $insertdata->insert($users_id_card, $users_firstname, $users_lastname, $users_email, $users_phonenumber, $users_detail_date, $users_address);
        
        if ($sql) {
            echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='insert.php';</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='insert.php';</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> เพิ่มข้อมูล </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <!-- <a href="index.php" class="btn btn-primary mt-3"> ย้อนกลับ </a> -->
        <!-- <hr> -->
        <h2 class="my-5"> เพิ่มข้อมูล </h2>
        <hr>
        <form action="" method="post">
            <div class="mb-3 ">
                <label for="users_id_card">ID Card</label>
                <input type="text" class="form-control" name="users_id_card" required>
            </div>
            <div class="mb-3">
                <label for="users_firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="users_firstname" required >
            </div>
            <div class="mb-3">
                <label for="users_lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="users_lastname" required>
            </div>
            <div class="mb-3 ">
                <label for="users_email">Email</label>
                <input type="users_email" class="form-control" name="users_email" required>
            </div>
            <div class="mb-3 ">
                <label for="users_phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="users_phonenumber" required>
            </div>

            <div class="mb-3 ">

                <label for="users_detail_date">Date<span class="asteriskField">*</span></label>

                <class="form-control input-md" required="">
                <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
                <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
                <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
                <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="md-3">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" id="users_detail_date" name="users_detail_date" required="" placeholder="DD-MM-YYYY" type="text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            </div>
        

        <script>
	        $(document).ready(function(){
            var date_input=$('input[name="users_detail_date"]'); //our date input has the name "date" 
		    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		    })
	    })
        </script> 

            <div class="mb-3 ">
                <label for="address">Address</label>
                <textarea name="users_address" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            
            <button type="submit" name="insert" class="btn btn-success">บันทึก</button>
            <button type="button" value="Refresh" class="btn btn-danger" onClick="javascript:location.reload();" >ยกเลิก</button>
            <hr>

    

        </form>
    

        <table id="mytacle" class="table table-bordered table-striped">
        <thead>
            <th>Number</th>
            <th>ID Card</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Posting Date</th>
            <th>Detail Date</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php $i = 1; //start number
            include_once('connectdb.php');
            $fetchdata = new DB_con();
            $sql = $fetchdata->fetchdata();
   
            while($row = mysqli_fetch_array($sql)){
            ?>

                <tr>
                    <td><?php echo $i++ ?> </td>
                    <td><?php echo $row['users_id_card']; ?> </td>
                    <td><?php echo $row['users_firstname']; ?> </td>
                    <td><?php echo $row['users_lastname']; ?> </td>
                    <td><?php echo $row['users_email']; ?> </td>
                    <td><?php echo $row['users_phonenumber']; ?> </td>
                    <td><?php echo $row['users_postingdate']; ?> </td>
                    <td><?php echo $row['users_detail_date']; ?> </td>
                    <td><?php echo $row['users_address']; ?> </td>

                    
                    <td><a href="update.php?id=<?php echo $row['users_id']; ?>" class="btn btn-primary"> Edit </a></td>
                    <td><a href="delete.php?del=<?php echo $row['users_id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

            <?php
}
            ?>

        </tbody>
        </table>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>