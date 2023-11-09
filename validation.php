<?php 

session_start();


if(ISSET($_SESSION["roles"]) && $_SESSION["roles"] == "student"){
    header('location:student/index.php');
  }
  elseif (ISSET($_SESSION["roles"]) && $_SESSION["roles"] == "admin") {
    header('location:admin/index.php');
} else {
    header('location:index.php');
}




 ?>