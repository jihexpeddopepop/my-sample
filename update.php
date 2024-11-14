<?php
    include_once('connectdb.php');

    $updatedata = new DB_con();

    
    if (isset($_POST['update'])){
        
        $users_id_card = $_POST['users_id_card'];
        $users_firstname = $_POST['users_firstname'];
        $users_lastname = $_POST['users_lastname'];
        $users_email = $_POST['users_email'];
        $users_phonenumber = $_POST['users_phonenumber'];
        $users_detail_date = $_POST['users_detail_date'];
        $users_address = $_POST['users_address'];
        
        if (isset($_GET['id'])) {
            $userid = $_GET['id'];  
        } else {
            echo "<script>alert('User ID is missing!');</script>";
            exit;
        }


        $sql = $updatedata->update($users_id_card, $users_firstname, $users_lastname, $users_email, $users_phonenumber, $users_detail_date, $users_address, $userid);
        

        if ($sql) {
            echo "<script>alert('Record Updated Successfully!');</script>";
            echo "<script>window.location.href='insert.php?id=" . $userid . "';</script>";  // ไปที่หน้า update.php เพื่อดูข้อมูลที่อัพเดตแล้ว
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='insert.php?id=" . $userid . "';</script>";  // ไปที่หน้า update.php เพื่อให้ผู้ใช้ได้แก้ไขใหม่
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> แก้ไขข้อมูล </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <a href="insert.php" class="btn btn-primary mt-3"> ย้อนกลับ </a>
    <hr>
        <h1 class="mt-5"> แก้ไขข้อมูล </h1>
        <hr>
        <?php
            $userid = $_GET['id'];
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)) {
        ?>
        
        <form action="" method="post">
            <div class="mb-3 ">
                <label for="users_id_card">ID Card</label>
                <input type="text" class="form-control" name="users_id_card" 
                value="<?php echo $row['users_id_card']; ?>"required>
            </div>
            <div class="mb-3">
                <label for="users_firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="users_firstname" 
                value="<?php echo $row['users_firstname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="users_lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="users_lastname" 
                value="<?php echo $row['users_lastname']; ?>"required>
            </div>
            <div class="mb-3 ">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="users_email" 
                value="<?php echo $row['users_email']; ?>"required>
            </div>
            <div class="mb-3 ">
                <label for="users_phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="users_phonenumber" 
                value="<?php echo $row['users_phonenumber']; ?>"required>
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
                                    <input class="form-control" id="users_detail_date" name="users_detail_date" placeholder="DD-MM-YYYY" type="text" value="<?php echo $row['users_detail_date']; ?>"required/>
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
                <textarea name="users_address" cols="30" rows="10" class="form-control" required><?php echo $row['users_address']; ?> </textarea>
                </div>

            <?php } ?>

            <button type="submit" name="update" class="btn btn-success"> บันทึก </button>
            <hr>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>