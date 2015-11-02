<?php
$servername = "localhost";
$username = "root";
$password = "Rugger33!";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "INSERT INTO homework (data)
VALUES ('first line')";

if ($conn->query($sql) === TRUE) {
    echo "Table homework created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

?>