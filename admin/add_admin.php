<!--Menu Section Starts-->
<?php include('lib/header.php'); ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
             <h1>ADD admin GUI</h1>
                <br> <br>
                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name"></td>
                        </tr>
                        <tr>
                            <td>User Name: </td>
                            <td><input type="text" name="user_name"></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="pass_word"></td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <input type="submit" name="submit" value="Add Admin" class="btn-option">
                            </td>
                        </tr>
                    </table>
                </form>
         </div>
    </div>
     <!--Footer Starts-->
<?php include('lib/footer.php') ?>
<?php 
    if(isset($_POST['submit'])){
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $pass_word = $_POST['pass_word'];
    
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        user_name='$user_name',
        pass_word='$pass_word'
        ";
        $res = mysqli_query($conn,$sql) or die();
        if($res==TRUE){
            $_SESSION['add'] = "<div class='success'>Admin added thành công</div>";
            header("location:".SITEURL.'admin/ql_admin.php');
        }
        else{
            $_SESSION['add'] = "<div class='error'>Không Thành công</div>";
            header("location".SITEURL.'admin/ql_admin.php');
        }
    }    
?>
