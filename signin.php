
<?php 
 if(!isset($_SESSION)) 
 { 
        session_start(); 
}

require_once ("dao.php");
$dao = new Dao();
$conn = $dao->getConnection();


$errors_em = array();
$errors_ps = array();


//validate data 

// check email
if(empty($_POST['useremail'])){
	$errors_em[]= "An email is required ";
}

// check password
if(empty($_POST['password']) && $_POST['password'] == ""){
	$errors_ps[] = "A password is required";
} 

if (0 < count($errors_em) || 0 < count($errors_ps) ){
		
           $_SESSION['form'] = $_POST;
           $_SESSION['errors_em'] = $errors_em;
           $_SESSION['errors_ps'] = $errors_ps;
           header("Location: signinform.php");
           exit;
}


// sanitize data

    if (0 == count($errors_em) && 0 == count($errors_ps)){
    	//echo"bal";
    	//exit;
    	//header ("Location: index.php");
    	$_SESSION['form'] = $_POST;
        $email = mysqli_real_escape_string($conn, $_POST['useremail']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
    }

		//$email = $_POST['useremail'];
		//$pass = $_POST['password'];


        
        //$sql = "SELECT count(*) FROM testuser where (email ='".$email."' and password='".$pass."')";
		//$query = mysqli_query($conn, $sql);
		//$result = mysqli_fetch_array($query);

		$query = $dao->checkusers($email, $pass);
		
		//if ($result[0]>0)
		if($query)
		{
			//$_SESSION ['email']=$email;
			$_SESSION['form'] = $_POST;
			header ("Location: index.php");
			//echo "Successful";
		    //echo "<br/><a href= 'group.php'>Sign In </a>";
		}
		else 
		{
			$errors_em[]= "Log in Failed";
		    $_SESSION['form'] = $_POST;
            $_SESSION['errors_em'] = $errors_em;
			//echo "Log in Falied";
			//echo "<br/><a href= 'signinform.php'> Sign In</a>";
		header("Location: signinform.php");
        exit;
		}
		
?>
