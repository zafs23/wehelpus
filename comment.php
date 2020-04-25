
<?php 
 if(!isset($_SESSION)) 
 { 
  session_start(); 
}

require_once ("dao.php");
$dao = new Dao();
$conn = $dao->getConnection();
$comment="";
$comment = mysqli_real_escape_string($conn, $_POST['comment']);


/*

$errors_cm = array();

$comment="";


//validate data 
if(empty($_POST['comment']) || strlen($_POST['comment']) == '0'){
  $errors_cm[]= "Please write a comment ";
}elseif (strlen($_POST['comment']) > '1000') {
    $errors_cm[]= "Comment cannot be more than 1000 chars long. ";
}

if (0 < count($errors_cm) ){
    $_SESSION['form'] = $_POST;
    $_SESSION['errors_cm'] = $errors_cm;
    header("Location: group.php");
    exit;
}


// sanitize data

    if (0 == count($errors_cm)){

      $_SESSION['form'] = $_POST;
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    }

   // if(isset($_SESSION['form'])) {
   //   $email = $_SESSION['form']['useremail'];
   // }

   // if(!$email){
   //   $errors_cm = "no email";
   // header ("Location: group.php");

    //}
    $query = $dao->savecomment($comment);
    
    //if ($result[0]>0)
    if($query)
    {
      //$_SESSION ['email']=$email;
      $_SESSION['form'] = $_POST;
      header ("Location: group.php");
      //echo "Successful";
        //echo "<br/><a href= 'group.php'>Sign In </a>";
    }
    else 
    {
      $errors_cm[] = "Cannot Post a Comment. ";
      $_SESSION['form'] = $_POST;
      header("Location: group.php");
      exit;
    }*/




        $query = $dao->savecomment($comment);

  //header("Location: http://cs401/comments.php");
  exit;
    
?>
