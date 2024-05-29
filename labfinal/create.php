<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: record.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
