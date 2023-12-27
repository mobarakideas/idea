<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop the table if it already exists
$sqlDrop = "DROP TABLE IF EXISTS registration";
$conn->query($sqlDrop);

// Create the table
$sqlCreate = "CREATE TABLE registration (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(25),
    FATHER_NAME VARCHAR(25),
    DATE_OF_BIRTH DATE,
    ADDRESS VARCHAR(50),
    PHONE BIGINT(15),
    ALTERNATE_PHONE BIGINT(15),
    EMAIL VARCHAR(30))";

if ($conn->query($sqlCreate) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
}
?>
