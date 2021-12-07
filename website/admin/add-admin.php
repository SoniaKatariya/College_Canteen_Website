<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
             if(isset($_SESSION['add'])) //checking whether the session is set or not
             {
                 echo $_SESSION['add']; //display the session message if set
                 unset($_SESSION['add']); //remove session message
             }
        ?>

        <form action="" method="POST">
          <table class="tbl-30">
              <tr>
                  <td>Full Name:</td>
                  <td><input type="text" name="full_name" placeholder="Enter Your Name"/></td>
              </tr>
              <tr>
                  <td>Username:</td>
                  <td>
                  <input type="text" name="username" placeholder="Enter Your Username"/></td> 
                  </tr>
                  <tr>
                      <td>Password:</td>
                      <td><input type="password" name="password" placeholder="Enter Your Password"/></td></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Add Admin" class="btn-secondary"/>

                      </td>
                  </tr>
          </table>
        </form>

</div>
</div>
<?php include('partials/footer.php'); ?>

<?php
//process the value from form and save it in database
//check whether the submit button is click or not
if(isset($_POST['submit']))
{
    //button click
    //echo "Button  clicked";
    //get the data from form
  $full_name= $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); //password Encryption with md5

  //SQL Query to save the data into database
  $sql = "INSERT INTO tbl_admin SET
  full_name='$full_name',
  username='$username',
  password='$password'
  ";
  //Execute query and save data in database
 
  $res = mysqli_query($conn, $sql) or die(mysqli_error());
  //check whether the data is inserted or not and display
  if($res==true)
  {
      //query executed and admin updated
      $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
      //redirect to manage admin page
      header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else
  {
      //failed tp update admin
      $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
      //redirect to manage admin page
      header('location:'.SITEURL.'admin/manage-admin.php');
  }
}

?>


