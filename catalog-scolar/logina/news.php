<?php
$servername = "localhost";
$username = "linndows_user";
$password = "?";
$dbname = "linndows_learn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE myNews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
informatie VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>