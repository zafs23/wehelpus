
<?php 
session_start();
require_once 'dao.php';
$dao = new Dao();

$email = isset($_GET['useremail']) ? $_GET['useremail'] : '';
//$query=mysqli_query($conn,"select * from testuser where email='$email'");
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>




<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="header_script.js"></script>
	<meta name="wehelpus" content="It is a supporting group."/>
	<title>We Help Us</title>
	<link rel="shortcut icon" type="image" href="fav.png">
	<link rel="stylesheet" href="headercss.css" />
</head>
<body id = "body">
<header>
<nav>
   <img id = "imglogo" src="logo.png" alt="logo">
   <ul id="horizontal-list" >
      <li id = "navbar" class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php">Home</a></li>
      <li id = "navbar" class="<?= ($activePage == 'group') ? 'active':''; ?>"><a href="group.php">Groups</a></li>
      <li id = "navbar" class="<?= ($activePage == 'healthyliving') ? 'active':''; ?>"><a href="healthyliving.php">Healthy Living</a></li>
      <li id = "navbar" class="<?= ($activePage == 'inspiration') ? 'active':''; ?>"><a href="inspiration.php">Inspiration</a></li>
      <script>
            $("li").click(function(){
               $(this).toggleClass("clicked");
            });
      </script>
      <?php
      if (isset($_SESSION['form']['useremail'])) {
         echo "<li id = 'navbar'><a href='logout.php'>Log Out</a></li>";
      } 
      else {
         echo "<li id = 'navbar'><a href='signinform.php'>Sign In</a></li>";
      }
      ?>
   </ul>
</nav>
</header>