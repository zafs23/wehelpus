<?php

require_once 'klogger.php';

class Dao {

  private $host = 'localhost';
  private $dbname = 'szafdb';
  private $username = 'root';
  private $password = '';
  private $logger;

  public function __construct() {
    $this->logger = new KLogger("log.txt", KLogger::WARN);
  }

  public function getConnection() {
    try {
      $connection = mysqli_connect("localhost", "root","", "szafdb");
      if ( !$connection ) {
           die( 'connect error: '.mysqli_connect_error() );
        }
    } catch (Exception $e) {
      $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
      return null;
    }
    return $connection;
  }


  public function getUsers($email) {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      $userquery = "SELECT * FROM testuser where email = ?";
      $stmt = $conn->prepare($userquery) or die(mysqli_error($conn));
      $stmt->bind_Param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      //return $conn->mysqli_query("select * from testuser where email=:email", PDO::FETCH_ASSOC);
      return $user;
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }


public function checkUsers($email, $password) {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
      $userquery = "SELECT * FROM testuser where email = ? and password = ?";
      $stmt = $conn->prepare($userquery) or die(mysqli_error($conn));
      $stmt->bind_Param("ss", $email, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      //return $conn->mysqli_query("select * from testuser where email=:email", PDO::FETCH_ASSOC);
      return $user;
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
}



  public function saveUser ($email,$fname,$lname, $pass) {
   $this->logger->LogDebug("Saving a user [{$email}]");
    
    //$saveQuery = "insert into testuser (email, fname, lname, pass) values (:email, :fname, :lname , :pass)";
    $conn = $this->getConnection();
    $saveQuery = "INSERT into testuser (email, firstName, lastName, password) values (?,?,?,?)";
    //$params = array($email,$fname,$lname, $pass);
    //$connection = mysqli_connect("localhost", "root","", "szafdb");
    if ($conn){
      //$stmt = mysqli_prepare($conn, $saveQuery) or die(mysqli_error($conn));
      $stmt = $conn->prepare($saveQuery) or die(mysqli_error($conn));
      //mysqli_prepared_query($conn,$query,"ssss",$params);
      $stmt->bind_Param("ssss", $email, $fname, $lname, $pass);
      //$stmt->ind_Param("ss", $fname);
      //$stmt->bind_Param( "s", $lname);
      //$stmt->bind_Param("s", $pass);
      //mysqli_stmt_bind_Param($stmt, "s", $pass);
      //$stmt->execute();
      //$result = $stmt->get_result();
      //$stmt->fetch();
      return $stmt->execute();
    }else {
      echo "Failed Connection";
      exit;
     }
    
    }

public function savecomment ($comment) {
   $this->logger->LogDebug("Saving a user [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "INSERT into usercomment (comment) values (?)";
    if ($conn){
      $stmt = $conn->prepare($saveQuery) or die(mysqli_error($conn));
      //mysqli_prepared_query($conn,$query,"ssss",$params);
      $stmt->bind_Param("s", $comment);
      return $stmt->execute();
    }else {
      echo "Failed Connection";
      exit;
     }
    
    }


    public function getComments() {
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try {
            $userquery = "SELECT comment FROM usercomment";
             //$stmt = $conn->prepare($userquery) or die(mysqli_error($conn));
      //$stmt->bind_Param();
      //$stmt->execute();


      $result = $conn->query($userquery);

      //$result = $stmt->get_result();
      //$user = $result->fetch_assoc();
      //return $conn->mysqli_query("select * from testuser where email=:email", PDO::FETCH_ASSOC);


      $resultarray = array();
     while ($row= $result->fetch_array()){
        $resultarray[] = $row;
      }


      return $resultarray;
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }


}