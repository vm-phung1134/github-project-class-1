<?php 
include('config/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn,$sql) or die();
    if($res==TRUE){
        $_SESSION['delete'] = "<div class='success'>Admin deleted thành công</div>";
        header("location:".SITEURL.'admin/ql_admin.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Không Thành công</div>";
        header("location".SITEURL.'admin/ql_admin.php');
    }
?>