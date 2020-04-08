
<?php 
session_start();
require_once 'dao.php';
$dao = new Dao();

$email = isset($_GET['useremail']) ? $_GET['useremail'] : '';
//$query=mysqli_query($conn,"select * from testuser where email='$email'");
?>

<html>
<head>
	<meta name="wehelpus" content="It is a supporting group." />
	<title>We Help Us</title>
	<link rel="shortcut icon" type="image" href="fav.png">
	<link rel="stylesheet" href="headercss.css" />
</head>
<body id = "body">
<header>
<nav>
   <img id = "imglogo" src="logo.png" alt="logo">
   <ul id="horizontal-list" >
      <li id = "navbar"><a class = "active" href="index.php">Home</a></li>
      <li id = "navbar"><a href="group.php">Groups</a></li>
      <li id = "navbar"><a href="healthyliving.php">Healthy Living</a></li>
      <li id = "navbar"><a href="inspiration.php">Inspiration</a></li>
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