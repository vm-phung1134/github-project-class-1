<!--Menu Section Starts-->
<?php include('lib/header.php'); ?>
    <!--Content Starts-->
<div class='main-content'>
     <div class="wrapper">
             <h1>Update Admin GUI</h1>
         <br> <br>
            <?php 
                $id=$_GET['id'];
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count = mysqli_num_rows($res);
                    if($count==1){
                        $row=mysqli_fetch_assoc($res);
                        $full_name = $row['full_name'];
                        $user_name = $row['user_name'];
                    }
                }else{
                    header('location:'.SITEURL.'admin/ql_admin.php');
                }
            ?>

         <form action="" method="post">
            <table class="tbl-30">
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>User Name: </td>
                            <td><input type="text" name="user_name"value="<?php echo $user_name; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="Update Admin" class="btn-option">
                            </td>
                        </tr>
            </table>
                
        </form>
    </div>
</div>
     <!--Footer Starts-->
<?php include('lib/footer.php'); ?>

<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
    
    $sql = "UPDATE tbl_admin SET
        full_name='$full_name',
        user_name='$user_name'
        WHERE
        id='$id'
        ";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
            $_SESSION['update'] = "<div style='color:#3498DB'>Admin updated thành công</div>";
            header("location:".SITEURL.'admin/ql_admin.php');
        }
        else{
            $_SESSION['update'] = "<div style ='color:red'>Không Thành công </div>";
            header("location".SITEURL.'admin/ql_admin.php');
        }
    }    
?>