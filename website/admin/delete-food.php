<?php 

      //include constants page
      include('../config/constants.php');
      //echo "Delete food page";
      if(isset($_GET['id']) && isset($_GET['image_name']))  //either use && or AND
      {
           //process to delete
           //echo "process to delete";

           //get id and image name
           $id = $_GET['id'];
           $image_name = $_GET['image_name'];

           //remove the image if available
           if($image_name != "")
           {
               $path = "../images/food/".$image_name;
               
               //remove image file from folder
               $remove = unlink($path);

               //check whether the image remove or not
               if($remove==false)
               {
                   //failed to remove the image
                   $_SESSION['upload'] = "<div class='error'>Failed to Remove image File.</div>";
                   header('location:'.SITEURL.'admin/manage-food.php');
                   die();

               }
           }

           //delete food from database
           $sql = "DELETE FROM tbl_food WHERE id=$id";
           $res = mysqli_query($conn, $sql);

           if($res==true)
           {
               //food delete
               $_SESSION['delete'] = "<div class='success'>Food Delete Successfully.</div>";
                   header('location:'.SITEURL.'admin/manage-food.php');
               
           }
           else
           {
               //failed to delete food
               $_SESSION['delete'] = "<div class='error'>Failed to Delete Food .</div>";
               header('location:'.SITEURL.'admin/manage-food.php');
           }

           //redirect to manage food with session message
      }
      else
      {
         //redirect to manage food page
         //echo "redirect";
         $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
         header('location:'.SITEURL.'admin/manage-food.php');
      }
?>