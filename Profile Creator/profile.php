<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
            margin: 3em;
        }

        .card-img-top {
            width: 60%;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card {
            padding: 1.5em 0.5em 0.5em;
            text-align: center;
            border-radius: 2em;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-weight: bold;
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form action="create_user.php" method="post">
            <div class="row d-flex gap-5">
                <div class="card" style="width: 18rem;">
                <div class="card-title">
                <h1 class="display-5">Create Your Account</h1>
                </div>
                    <div class="card-body">
                        <input type="submit" value="Create Profile" name="submit" class="btn btn-outline-primary mt-5">
                    </div>
                </div>
                  
            <?php
                require "connection.php";
                $query = "SELECT * FROM user_info";
                $result = mysqli_query($connection, $query);
                $rows = mysqli_num_rows($result);
                if($rows > 0){
        while ($data = mysqli_fetch_assoc($result)) {
            $name = $data['full_name'];
            $skill  = $data['skills'];
            echo <<<CARD
            <div class="card" style="width: 18rem;">
                <img src="https://ui-avatars.com/api?name=$name&background=random" class="card-img-top img-thumbnail" alt="Profile Image">
                <div class="card-body">
                    <h5 class="card-title">$name</h5>
                    <p class="card-text">$skill</p>
                    <a href="profileinfo.php?id={$data['id']}" class="btn btn-outline-primary">Profile Info</a>
                </div>
            </div>
        CARD;

        }
        }
            ?>
            </div>
          

        </form>
    </div>
</body>

</html>