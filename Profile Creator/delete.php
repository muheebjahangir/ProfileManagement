<?php
require "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   $query = "DELETE FROM user_info WHERE id = $id";
   $result = mysqli_query($connection, $query);
    if ($result == true){
      echo "<script>alert('Profile Deleted')</script>";
      echo "<script>location.href = 'profile.php'</script>";
    }
    else{
      echo "<script>alert('Something went wrong')</script>";
    }
}
?>