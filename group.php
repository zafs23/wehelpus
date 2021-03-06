<?php
include 'header.php';

//  if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
//    header("Location: signinform.php");
//    exit;
//  }

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signinform.php");
    exit;
}

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


    require_once 'dao.php';
    $dao = new Dao();

?>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="comment_ajax.js"></script>
    <link rel="stylesheet" type="text/css" href="groupcss.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda+One&family=Permanent+Marker&display=swap" rel="stylesheet">
  </head>
  <body >
  	<div id = "container">
  		<div id = "main">
      <h1 id = "head" >Log in To Post a Comment</h1>
      <p id = "head2">Please keep your personal data intact. No images are allowed to post.</p>
        <title id = "t">Log in to Post a Comment</title>
        <?php $comments = $dao->getComments();?>
          <nav id = "list" class = "listclass">
            <?php foreach ($comments as $comment): ?>
            <ol id = "ol">
                  <?php echo "<li>Comment : " . $comment['comment'] . "</li>"; ?>
            </ol>
            <?php endforeach ?>
        </nav>
      </div>
    </div>
    <div id = "form_class">
        <h4 id = "heading_comment">Post a comment: </h4>
        <form  id = "comment_form" action="comment.php" method="post" enctype="multipart/form-data">
          <textarea type = "text" id ="comment" name="comment" value ="" class="comment" rows="5" cols="70"></textarea>
          <?php 
          if (isset($_SESSION['errors_cm'])){
          foreach ($_SESSION['errors_cm'] as $error) {
             echo "{$error}";
            }
            unset($_SESSION['errors_cm']);
        }
        ?>
          <br>
        <input class = "submit_button" type="submit" name="submit" value="Post"></br></form>
  </div>
</body>
</html>


<?php

include 'footer.php';

?>