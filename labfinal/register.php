<?php
include 'db.php';

// Retrieve form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$address = $_POST['address'];

// SQL query to insert data into the 'students' table
$sql = "INSERT INTO users (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Redirect to the record page after successful registration
    header("Location: record.html");
    exit();
} else {
    // Handle errors
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
