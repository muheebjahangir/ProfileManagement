<?php
require "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM user_info WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $name = $data["full_name"];
            $email = $data["email"];
            $number = $data["mobile"];
            $address = $data["address"];
            $skills = $data["skills"];
            $skills_array = explode(",", $skills);
            $skill_str = join(",", $skills_array);
            $insta = $data["insta"];
            $facebook = $data["facebook"];
            $tiktok = $data["tiktok"];
            $gender = $data["gender"];
            $image = $data["image"];
        }

        if (isset($_POST["update"])) {
            $name = $_POST['full_name'];
            $email = $_POST['email'];
            $number = $_POST['phone'];
            $address = $_POST['address'];
            $skills = implode(",", $_POST['skills']);
            $insta = $_POST['insta'];
            $facebook = $_POST['facebook'];
            $tiktok = $_POST['tiktok'];
            $gender = $_POST['gender'];
            $image_name = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            
              move_uploaded_file($image_temp,"images/$image_name");
          

            $update_query = "UPDATE user_info SET
                full_name = '$name',
                email = '$email',
                mobile = '$number',
                address = '$address',
                skills = '$skills',
                gender = '$gender',
                insta = '$insta',
                facebook = '$facebook',
                tiktok = '$tiktok',
                image = '$image_name'
                WHERE id = '$id'";

            $result = mysqli_query($connection, $update_query);

            if ($result) {
                echo "Account Updated";
            } else {
                echo "Something went wrong: " . mysqli_error($connection);
            }
        }
    } else {
        echo "No user found with the specified ID.";
    }
} else {
    echo "No ID provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="full_name" value="<?php echo $name; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $number; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleInputaddress" name="address" value="<?php echo $address; ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Skills</label>
        <select class="form-control select2" multiple="multiple" name="skills[]">
          <option value="HTML" <?php echo (in_array("HTML", $skills_array)) ? 'selected' : ''; ?>>HTML</option>
          <option value="CSS" <?php echo (in_array("CSS", $skills_array)) ? 'selected' : ''; ?>>CSS</option>
          <option value="JAVASCRIPT" <?php echo (in_array("JAVASCRIPT", $skills_array)) ? 'selected' : ''; ?>>JAVASCRIPT</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Instagram</label>
        <input type="text" class="form-control" name="insta" value="<?php echo $insta; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Twitter</label>
        <input type="text" class="form-control" name="tiktok" value="<?php echo $tiktok; ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Facebook</label>
        <input type="text" class="form-control" name="facebook" value="<?php echo $facebook; ?>">
      </div>

      <select name="gender" class="select2 form-control">
        <option value="Male" <?php echo ($gender == "Male") ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo ($gender == "Female") ? 'selected' : ''; ?>>Female</option>
        <option value="none" <?php echo ($gender == "none") ? 'selected' : ''; ?>>Not specified</option>
      </select>
      <input type="file" name="image">
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
