<?php

include("connect.php");

$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);

//Fetching the no. of blogs...
$numRows = mysqli_num_rows($result);

if ($numRows > 0) {

  while ($numRows!=0) {

    //Fetch data from blogs table...
    $row = mysqli_fetch_array($result);

    //Retrieve username with the help of user_id in blogs table...

    $user_id = $row['user_id'];
    $selectQuery = "SELECT * FROM users WHERE id = $user_id;";
    $queryfire = mysqli_query($conn, $selectQuery);
    $postUser = mysqli_fetch_array($queryfire);

    echo '
  <div class="sub-cont">
      <h2>' . $row['blog_title'] . '</h2>
      <p>' . $row['blog_cont'] . '</p>
      <div class="postDetail">
        <p> ' . "Posted By : " . '  ' . $postUser['username'] . '</p> 
        <p> ' . "Posted on : " . '  ' . $row['post_date'] . '</p>
      </div>

      <div class="sub-comment">
        <textarea id="comment" placeholder="Add a comment here"></textarea>
        <button type="button" onclick="commentIt(this)" id="sendcom">Send</button>
      </div>
    </div>';

    $numRows = $numRows - 1;

  }

} 
