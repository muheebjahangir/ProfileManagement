<?php
if (isset($_GET["id"])) {
    if(isset($_GET["update"])) {
    

    $name = isset($_GET["full_name"]) ? $_GET["full_name"] : '';
    $email = isset($_GET["email"]) ? $_GET["email"] : '';
    $number = isset($_GET["phone"]) ? $_GET["phone"] : '';
    $address = isset($_GET["address"]) ? $_GET["address"] : '';
    
    $skills = isset($_GET["skills"]) ? $_GET["skills"] : [];
    $skill_str = implode(",", $skills); 
    
    $insta = isset($_GET["insta"]) ? $_GET["insta"] : '';
    $facebook = isset($_GET["facebook"]) ? $_GET["facebook"] : '';
    $tiktok = isset($_GET["tiktok"]) ? $_GET["tiktok"] : '';
    $gender = isset($_GET["gender"]) ? $_GET["gender"] : '';

    require "connection.php";

    
    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $number = mysqli_real_escape_string($connection, $number);
    $address = mysqli_real_escape_string($connection, $address);
    $skill_str = mysqli_real_escape_string($connection, $skill_str);
    $insta = mysqli_real_escape_string($connection, $insta);
    $facebook = mysqli_real_escape_string($connection, $facebook);
    $tiktok = mysqli_real_escape_string($connection, $tiktok);
    $gender = mysqli_real_escape_string($connection, $gender);
    
    
    $id = intval($_GET['id']);

 
    $query = "UPDATE user_info SET 
                full_name = '$name', 
                email = '$email', 
                mobile = '$number', 
                address = '$address', 
                skills = '$skill_str', 
                insta = '$insta', 
                gender = '$gender', 
                facebook = '$facebook', 
                tiktok = '$tiktok' 
              WHERE id = $id"; 

    $result = mysqli_query($connection, $query);

};
if ($result) {
    echo "Account Updated Successfully";
} else {
    echo "Something went wrong: " . mysqli_error($connection);
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

    <title>Update Your Account</title>
</head>
<body>
  <div class="d-flex">
    <a href="profile.php" class="btn btn-outline-primary ms-auto py-3 px-5">Go Back</a>
  </div>
  <div class="container my-5">

    <form method="get">
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
        <label for="exampleInputPassword1" class="form-label">Facebook</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="facebook">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">TikTok</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="tiktok">
      </div>

      <select name="gender" class="select2 form-control">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="none">Not specified</option>
      </select>

      <input type="submit" value="Update" name="update" class="btn btn-outline-primary py-2 px-5 mt-3">
    </form>
  </div>

  <script>
    $(".select2").select2({
      tags: true
    });
  </script>

</body>
</html>
