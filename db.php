<?php

        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn,"szafdb");
/*
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "szafreenDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE Users (
    id int(10) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Users created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
*/
?>
