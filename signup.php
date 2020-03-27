
<?php 
session_start();


$errors_em = array();
$errors_fm = array();
$errors_lm = array();
$errors_ps = array();


require_once ("dao.php") ;
$dao = new Dao();
$conn = $dao->getConnection();


	//validate

	//if(isset($_POST['submit'])){

        $email = $pass = $fname = $lname = "";

        //$email = $_POST['useremail'];
		
		// check email
		if(empty($_POST['useremail'])){
			$errors_em[]= "An email is required ";
		} else{
			if (strlen($_POST['useremail']) > '100') {
                     $errors_em[]= "Your Email Cannot be more than 100 Character long";
            }elseif(!filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL)){
       				$errors_em[]= "Email must be a valid email address";
			}elseif($userquery = $dao->getUsers(mysqli_real_escape_string($conn, $_POST['useremail']))){
				// check if the user is already in the database
				$errors_em[] = "The email address already exits";
			}
		}

		// check password
		if(empty($_POST['password']) && $_POST['password'] == ""){
			    $errors_ps[] = "A password is required";
		} else{
			    if (strlen($_POST['password']) <= '7') {
                     $errors_ps[]= "Your Password Must Contain At Least 8 Digits ";
                }
                elseif (strlen($_POST['password']) > '30') {
                     $errors_ps[]="Your Password Cannot be More than 30 Digits";
                }
                elseif(!preg_match("#[0-9]+#",$_POST['password'])) {
                    $errors_ps[]= "Your Password Must Contain At Least 1 Number";
                }
                elseif(!preg_match("#[A-Z]+#",$_POST['password'])) {
                    $errors_ps[]= "Your Password Must Contain At Least 1 Capital Letter ";
                }
                elseif(!preg_match("#[a-z]+#",$_POST['password'])) {
                    $errors_ps[]= "Your Password Must Contain At Least 1 Lowercase Letter";
                }
                elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])) {
                    $errors_ps[]= "Your Password Must Contain At Least 1 Special Character ";
                }
		}

		// check first name
		if(empty($_POST['firstname'])){
			$errors_fm[]="A First Name is required <br />";
		} else{

			if (strlen($_POST['firstname']) > '100') {
                     $errors_fm['firstname']= "Your First Name Cannot be more than 100 Character Long";
            }elseif(!preg_match('/^[a-zA-Z]/', $_POST['firstname'])){
				$errors_fm[]= "First Name must contain only Characters";
			}
		    
		    
			
		}

		// check last name 
		if(empty($_POST['lastname'])){
			 $errors_lm[]= "A Last Name is required";
		} elseif (strlen($_POST['lastname']) > '100') {
                $errors_lm[]= "Your Last Name Cannot be more than 100 Character Longhow to";
            }elseif(!preg_match('/^[a-zA-Z]/', $_POST['lastname'])){
				$errors_lm[]= "Last Name must contain only Characters";
	    }


	//}

        
       // $sql = "INSERT into testuser value ('".$email."', '".$fname."', '".$lname."', '".$pass."')";
		//$query = mysqli_query($conn, $sql);


	if (0 < count($errors_em) || 0 < count($errors_fm) || 0 < count($errors_lm) || 0 < count($errors_ps) ){
		
           $_SESSION['form'] = $_POST;
           $_SESSION['errors_em'] = $errors_em;
           $_SESSION['errors_fm'] = $errors_fm;
           $_SESSION['errors_lm'] = $errors_lm;
           $_SESSION['errors_ps'] = $errors_ps;
           header("Location: signupform.php");
           exit;
    }

/*
    public function error_for($variable){
    	if ($errors[$variable]){
    		return "<div class = 'form_error'>".$errors[$variable]."</div>";
    	}
    }

    public function h($string){
        return htmlspecialchars($string);
    }
    */

        // sanitize 
    
    if (0 == count($errors_em) && 0 == count($errors_fm) && 0 == count($errors_lm) && 0 == count($errors_ps)){
    	//echo"bal";
    	//exit;
    	//header ("Location: index.php");
    	$_SESSION['form'] = $_POST;
        $email = mysqli_real_escape_string($conn, $_POST['useremail']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$fname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    }

   
   

	$query = $dao->saveUser($email, $fname, $lname, $pass);
	if (!$query)
	{
			echo "Failed";
			header ("Location: signupform.php");
		    //echo "<br/><a href= 'group.php'>SignUp </a>";
	}
	else 
	{
			header ("Location: index.php");
			//echo "Successful";
			//echo "<br/><a href= 'group.php'> Group Page</a>";
	}
	

    
    //$query = $dao->saveUser($email, $fname, $lname, $pass);
	
	//unset($_SESSION['form']);
		

		
?>