<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO users (name, gender, email, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $gender, $email, $address);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: record.html");
    exit();
} else {
    echo "Invalid request method.";
}
?>
