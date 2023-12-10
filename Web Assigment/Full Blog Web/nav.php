<?php

include("connect.php");

$loggedin = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}

echo '<nav id="navbar">

<div class="nav-item">

  <a href="index.php">HOME</a>
  <a href="others/content.html">CONTENT</a>
  <button type="button" onclick="openPopup()">WRITE</button>

</div>';

if ($loggedin) {
  echo '
  <div class="nav-item">
  <a href="logout.php">LOGOUT</a>
</div>
</nav>';
}

if (!$loggedin) {
  echo '
  <div class="nav-item">
  <a href="signup.php">SIGNUP</a>
  <a href="login.php">LOGIN</a>
</div>
</nav>';
}

?>