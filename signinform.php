

<?php 
  session_start();
    require_once 'dao.php';
    $dao = new Dao();


  $email_preset = "";
  $pass_preset = "";
  //$fname_preset ="";
  //$fname_preset ="";

  if (isset($_SESSION['form'])) {
    $email_preset = $_SESSION['form']['useremail'];
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
  <h1>Sign in to We Help Us</h1>
  <form  action="signin.php" method="POST" enctype="multipart/form-data">
    <p><input type="text" name="useremail" value="<?php echo $email_preset; ?>" placeholder="Email"></p>
          <?php 
        if (isset($_SESSION['errors_em'])){
          foreach ($_SESSION['errors_em'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_em']);
        }
        ?>
    <p><input type="password" name="password" value="<?php echo $pass_preset; ?>"  placeholder="Password"></p>

    <?php 
        if (isset($_SESSION['errors_ps'])){
          foreach ($_SESSION['errors_ps'] as $error) {
             echo "<p id='error'>{$error}</p>";
            }
            unset($_SESSION['errors_ps']);
        }
      ?>

    <p class="remember_me">
      <label for= "checkbox">
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label>
    </p>
    <p class="submit"><input type="submit" name="commit" value="Sign In"></p>
  </form>
</div>

<div class="login-help">
  <?php 
        
    unset($_SESSION['form']);
  ?>
  <p>Not a Member? <a href="signupform.php">Sign Up here</a>.</p>
</div>


<!--<div class="login-help">
  <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
</div>
-->

</body>

</html>

