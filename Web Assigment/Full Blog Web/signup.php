<?php

$showAlert = false;
$showErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include("connect.php");

  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  //Check if all fields are filled in...

  if (empty($username) || empty($password) || empty($cpassword)) {

    $showErr = "Please fill in all the fields";

  } else {

    //Check if the username is unique...

    $existSql = "SELECT * FROM `users` where username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows == 0) {

      //Check if both passwords match each other...

      if (($password == $cpassword)) {

        $sql = "INSERT INTO users (`username`,`password`) VALUES ('$username','$password');";
        $result = mysqli_query($conn, $sql);

        //Successfully registered if no error occurs...

        if ($result) {
          $showAlert = true;
        }

      } else {
        $showErr = "Passwords do not match";
      }

    } else {

      $showErr = "Username already taken!";

    }

  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="others/style.css?v=<?php echo time(); ?>">

</head>

<body>

  <div class="form-body">

    <?php
    if ($showAlert == true) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"
      style="width:500px;text-align:center;font-size:20px;">
      <strong>Sucessfully Registered! Go back to login :)</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <?php
    if ($showErr) {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"
      style="width:500px;text-align:center;font-size:20px;">
      <strong>' . $showErr . '</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <h1>Sign Up to our website!</h1>

    <form action="signup.php" method="POST" class="sub-fbody">

      <h2>Username:</h2>
      <input type="text" name="username" placeholder="Enter your username">

      <h2>Password:</h2>
      <input type="password" name="password" placeholder="Enter a password">

      <h2>Confirm Password:</h2>
      <input type="password" name="cpassword" placeholder="Enter the password again">

      <div><button type="submit">Sign Up</button></div>
      <div><a href="login.php">Already have an account?</a></div>

    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</body>

</html>