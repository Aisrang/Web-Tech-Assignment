<?php

$login = false;
$showErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include("connect.php");

  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'; ";

  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    $login = true;

    session_start();

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: index.php");
  } else {
    $showErr = "Invalid Credentials";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="others/style.css?v=<?php echo time(); ?>">

</head>

<body>

  <div class="form-body">

    <?php
    if ($showErr) {
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"
      style="width:500px;text-align:center;font-size:20px;">
      <strong>' . $showErr . '</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <h1>Login to our website!</h1>

    <form action="login.php" method="POST" class="sub-fbody">

      <h2>Username:</h2>
      <input type="text" name="username" placeholder="Enter your username">

      <h2>Password:</h2>
      <input type="password" name="password" placeholder="Enter a password">

      <div><button type="submit">Login</button></div>
      <div><a href="signup.php">Are you a new user?</a></div>

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