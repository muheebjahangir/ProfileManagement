<?php


if (isset($_POST["create"])) {
  $name = $_POST["full_name"];
  $email = $_POST["email"];
  $number = $_POST["phone"];
  $address = $_POST["address"];
  $skills = $_POST["skills"];
  $skill_str = join(",", $skills);
  $insta = $_POST["insta"];
  $facebook = $_POST["facebook"];
  $tiktok = $_POST["tiktok"];
  $gender = $_POST["gender"];
  // image uploading
  $image_name = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  
    move_uploaded_file($image_temp,"images/$image_name");


    require "connection.php";

    $query = "INSERT INTO user_info(full_name,email,mobile,address,skills,gender,insta,facebook,tiktok,image) VALUES ('$name','$email',$number,'$address','$skill_str','$gender','$insta','$facebook','$tiktok','$gender','$image_name')"; 

    $result = mysqli_query($connection, $query);
    if ($result == true){
      echo "Account Created";
    }
    else{
      echo "something went wrong";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <title>Create Your Account</title>
</head>

<body>
  <div class="d-flex">
  <a href="profile.php" class="btn btn-outline-primary ms-auto py-3 px-5">Go Back</a>
  </div>
  <div class="container my-5">

    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="full_name">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleInputaddress" name="address">
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Skills</label>
        <select class="form-control select2" multiple="multiple" name="skills[]">
          <option>HTML</option>
          <option>CSS</option>
          <option>JAVASCRIPT</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Instagram</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="insta">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Twitter</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="tiktok">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Facebook</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="facebook">
      </div>

      <select name="gender" class="select2 form-control">
        <option value="Male">Male</option>
        <option value="Female">Famale</option>
        <option value="none">Not specified</option>
      </select>
      <input type="file" name="image">
      <input type="submit" value="submit" name="create" class="btn btn-outline-primary py-2 px-5 mt-3">
    </form>
    <?php 

    ?>
  </div>
  <script>
    $(".select2").select2({
      tags: true
    });
  </script>

</body>

</html>