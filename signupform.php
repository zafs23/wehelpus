<?php 
  session_start();
    require_once 'Dao.php';
    $dao = new Dao();


  $email_preset = "";
  $pass_preset = "";
  $fname_preset ="";
  $fname_preset ="";
  if (isset($_SESSION['form'])) {
    $email_preset = $_SESSION['form']['useremail'];
    $fname_preset = $_SESSION['form']['firstname'];
    $lname_preset = $_SESSION['form']['lastname'];
    $pass_preset = $_SESSION['form']['password'];

  }
  


?>


<html>
<head>
	<link rel="shortcut icon" type="image" href="fav.png">
<link rel="stylesheet" type="text/css" href="signupCss.css">
</head>
<body>
<div class="login">
  <h1>Sign Up to We Help Us</h1>
  <form  action="signup.php" method="POST" enctype="multipart/form-data">
    <p><input type="text" name="useremail" value="<?php if(isset($email_preset)){echo $email_preset;} ?>" placeholder="Email"></p>
      <?php 
        if (isset($_SESSION['errors_em'])){
          foreach ($_SESSION['errors_em'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_em']);
        }
        ?>
    
    <p><input type="password" name="password" value="<?php if(isset($pass_preset)){echo $pass_preset;} ?>" placeholder="Password"></p>
      <?php 
        if (isset($_SESSION['errors_ps'])){
          foreach ($_SESSION['errors_ps'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_ps']);
        }
      ?>
    <p><input type="text" name="firstname" value="<?php if(isset($fname_preset)){echo $fname_preset;} ?>" placeholder="First Name"></p>
    <?php 
        if (isset($_SESSION['errors_fm'])){
          foreach ($_SESSION['errors_fm'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_fm']);
        }
    ?>
    <p><input type="text" name="lastname" value="<?php if(isset($lname_preset)) {echo $lname_preset;} ?>" placeholder="Last Name"></p>
    <?php 
        if (isset($_SESSION['errors_lm'])){
          foreach ($_SESSION['errors_lm'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_lm']);
        }
    ?>
<!--    <p class="remember_me">
      <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label>
    </p>
  -->
    <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
  </form>
</div>
</body>
</html>

