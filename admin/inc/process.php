<?php
require_once('db.php');
session_start();
if(!isset($_SESSION['email'])){
    header('location: ../login.php');
}
    



if(isset($_POST['add-category'])){
    
   $cat_name = $_POST['cat-name'];
    
    if (empty($cat_name)){
        
        header('location: ../categories.php?error=Categories name require');
       }
    else{
        $query="INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
        if (mysqli_query($conn, $query)){
            
             header('location: ../categories.php?success=Categories Has Been Added');
        }
        else{
             header('location: ../categories.php?error=This category Already Exist');
        }
    }
}

//--------------------------update-------------------------



if(isset($_POST['update-category'])){
    
    $edit_id = $_GET['update_category'];
   $up_cat_name = $_POST['up-cat-name'];
    
    if (empty($up_cat_name)){
        
        header("location: ../categories.php?uperror=Categories name require&edit=$edit_id");
       }
    else{
        $query="UPDATE `categories` SET `cat_name` = '$up_cat_name' WHERE `cat_id` = $edit_id";
        if (mysqli_query($conn, $query)){
            
             header("location: ../categories.php?upsuccess=Categories Has Been updated&edit=$edit_id");
        }
        else{
             header("location: ../categories.php?uperror=This category Already Exist&edit=$edit_id");
        }
    }
}





?>