<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dig_album";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname );
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // Create table
    /*$sql = "CREATE TABLE User (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(30) NOT NULL,
        Full_name VARCHAR(30) NOT NULL,
        Passwordd VARCHAR(50)NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
      if ($conn->query($sql) === TRUE) {
        echo "Table created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }**/

    
?>

  
