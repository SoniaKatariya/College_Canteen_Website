<?php

     //include constants.php file here
     include('../config/constants.php');
     //1 step :=> get id of admin to be deleted
      $id = $_GET['id'];

     //2 step :=> create sql query to delect admin
     $sql = "DELETE FROM tbl_admin WHERE id=$id";

      //execute the query
      $res = mysqli_query($conn, $sql);

      //check whether the query executed successfully or not
      if($res==true)
      {
           //query executed successully and admin deleted
          // echo "admin delected";
          //create session variable to display message
          $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
          //redirect to message admin page
          header('location:'.SITEURL.'admin/manage-admin.php');
      }
      else
      {
        //failed to delete admin
        //echo "failed ";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

      }
     //3 step :=> redirect to manage admin page with message (succes/error)



?>