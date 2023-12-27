<?php
$NAME = $_POST['Name'];
$FATHER_NAME = $_POST['FatherName'];
$DATE_OF_BIRTH = $_POST['DateofBirth'];
$ADDRESS = $_POST['Address'];
$PHONE = $_POST['Phone'];
$ALTERNATE_PHONE = $_POST['AlternatePhone'];
$EMAIL = $_POST['Email'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'mydb');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (NAME, FATHER_NAME, DATE_OF_BIRTH, ADDRESS, PHONE, ALTERNATE_PHONE, EMAIL) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiis", $NAME, $FATHER_NAME, $DATE_OF_BIRTH, $ADDRESS, $PHONE, $ALTERNATE_PHONE, $EMAIL); 
   
    $execval = $stmt->execute();
    if ($execval === false) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Registration successfully...";
    }
    $stmt->close();
    $conn->close();
}
?>
