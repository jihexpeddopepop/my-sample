<?php
    include_once('connectdb.php');

    if (isset($_GET['del'])){
        $userid = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->delete($userid);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfuly!');</script>";
            echo "<script>window.location.href='insert.php'</script>";
        }
    }
?>