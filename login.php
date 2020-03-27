
<?php include_once ("db.php") ?>;

<?php
		$email = $_POST['useremail'];
		$pass = $_POST['password'];


        
        $sql = "SELECT count(*) FROM testuser where (email ='".$email."' and password='".$pass."')";
		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_array($conn, $query);
		
		if ($result[0]>0)
		{
			echo "Successful".mysqli_error($conn);
		    echo "<br/><a href= 'group.php'>SignUp </a>";
		}
		else 
		{
			echo "Error";
			echo "<br/><a href= 'group.php'> Group Page</a>";
		}
		
?>
