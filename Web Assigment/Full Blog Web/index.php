<?php

session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//   header("location: login.php");
//   exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Dekho Bhai</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="others/style.css?v=<?php echo time(); ?>">
  <script src="others/work.js"></script>

</head>

<body>

  <?php
  require("nav.php");
  ?>

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<center> <div class="alert alert-success alert-dismissible fade show" role="alert"
      style="width:500px;text-align:center;font-size:20px;">
      <strong>You are logged in!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div></center>';
  }
  ?>

  <?php
  if (isset($_SESSION['post_date'])) {
    echo '<center> <div class="alert alert-success alert-dismissible fade show" role="alert"
      style="width:500px;text-align:center;font-size:20px;">
      <strong>Congrats! Your blog is posted!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div></center>';
  }
  ?>

  <?php
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    echo "<h2 class = 'welcome'>Welcome " . $_SESSION['username'] . " </h2>";
  }
  ?>


  <div class="cont" id="contId">

    <div class="sub-cont">
      <h2>HTML</h2>
      <p>The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in
        a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as
        Cascading Style Sheets (CSS) and scripting languages such as JavaScript.<br>

        Web browsers receive HTML documents from a web server or from local storage and render the documents into
        multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for
        its appearance.</p>

      <div class="sub-comment">
        <textarea id="comment" placeholder="Add a comment here"></textarea>
        <button type="button" onclick="commentIt(this)" id="sendcom">Send</button>
      </div>

    </div>

    <div class="sub-cont">
      <h2>CSS</h2>
      <p>Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document
        written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).[1] CSS
        is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.<br>

        [2]CSS is designed to enable the separation of content and presentation, including layout, colors, and fonts.[3]
        This separation can improve content accessibility; provide more flexibility and control in the specification of
        presentation characteristics.</p>

      <div class="sub-comment">
        <textarea id="comment" placeholder="Add a comment here"></textarea>
        <button type="button" onclick="commentIt(this)" id="sendcom">Send</button>
      </div>
    </div>

    <?php

    include("blog_post.php");

    ?>

  </div>



  <!-- Pop Up form -->

  <form class="overlay" id="overlayId" action="blog_insert.php" method="post">

    <div class="inputs">
      <form>
        <div style="padding-bottom:20px;">
          <h3>Title</h3>
          <input type="text" id="title" name="title" maxlength="30" placeholder="Enter the blog title">
        </div>

        <div style="padding-bottom:20px;">
          <h3>Blog Content</h3>
          <textarea id="blogCont" name="content" maxlength="1000" placeholder="Enter the main content"></textarea>
        </div>
      </form>

      <div class="inputs-btn">
        <button type="submit">Submit</button>
        <button type="button" onclick="closePopup()">Close</button>
        </inputs-btn>
      </div>
    </div>

  </form>

  <!-- Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

</body>

</html>