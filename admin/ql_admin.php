<!--Menu Section Starts-->
<?php include('lib/header.php') ?>
    <!--Content Starts-->
    <div class='main-content'>
         <div class="wrapper">
               <h1>Admin Management</h1>
               <br>
               <a href="add_admin.php" class="btn-primary">Add Admin</a>
               <br> <br>
               <?php
                    //insert
                    if(isset($_SESSION['add']))
                    {
                         echo $_SESSION ['add'];
                         unset($_SESSION ['add']);
                    }
                    //delete
                    if(isset($_SESSION['delete']))
                    {
                         echo $_SESSION ['delete'];
                         unset($_SESSION ['delete']);
                    }
                    //update
                    if(isset($_SESSION['update']))
                    {
                         echo $_SESSION ['update'];
                         unset($_SESSION ['update']);
                    }
                    if(isset($_SESSION['not-found']))
                    {
                         echo $_SESSION ['not-found'];
                         unset($_SESSION ['not-found']);
                    }
                    if(isset($_SESSION['not-match']))
                    {
                         echo $_SESSION ['not-match'];
                         unset($_SESSION ['not-match']);
                    }
                    if(isset($_SESSION['change']))
                    {
                         echo $_SESSION ['change'];
                         unset($_SESSION ['change']);
                    }
               ?>
               <br> <br>
               <table class="tbl-full">
                    <tr>
                         <th>S.N.</th>
                         <th>Full Name</th>
                         <th>Username</th>
                         <th>Action</th>   
                    </tr>
                    

                    <?php 
                         $sql = "SELECT * FROM tbl_admin";
                         $res = mysqli_query($conn,$sql);
                         $sn=1;
                         if($res==TRUE){
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($rows = mysqli_fetch_assoc($res)){
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $user_name=$rows['user_name'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $sn++; ?></td>
                                                  <td><?php echo $full_name ?></td>
                                                  <td><?php echo $user_name ?></td>
                                                  <td>
                                                       <a href="<?php echo SITEURL; ?>admin/change_password.php?id=<?php echo $id; ?>" class="btn-option">Change Password</a>
                                                       <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-option">Update Admin</a>
                                                       <a href="<?php echo SITEURL; ?>admin/del_admin.php?id=<?php echo $id; ?>" class="btn-option">Delete Admin</a>
                                                  </td>
                                             </tr>

                                        <?php 
                                   }

                              }
                              
                              
                         }
                    ?>

               </table>
         </div>
    </div>
     <!--Footer Starts-->
<?php include('lib/footer.php') ?>