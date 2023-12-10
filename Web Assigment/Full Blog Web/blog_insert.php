<?php

include("connect.php");
session_start();

$username = $_SESSION['username'];

//Check if the current user exists in the database...

$sql = "SELECT * FROM users WHERE username = '$username'";
$queryfire = mysqli_query($conn, $sql);
$user_fetch = mysqli_fetch_array($queryfire);

if ($user_fetch) {

  $blog_title = $_POST["title"];
  $blog_cont = $_POST["content"];
  $blog_userId = $user_fetch['id'];

  //Inserting the blog data into blogs table....

  $insertQuery = "INSERT INTO blogs (`blog_title`,`blog_cont`,`user_id`) VALUES ('$blog_title','$blog_cont','$blog_userId');";
  $result = mysqli_query($conn, $insertQuery);

  header("location: index.php");

} else {
  $_SESSION['postErr'] = "Error! Please try again later..";
  header("location: index.php");
}