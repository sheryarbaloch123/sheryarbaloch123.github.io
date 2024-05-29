<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET name='$name', gender='$gender', email='$email', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
        <label>Gender:</label><br>
        <input type="text" name="gender" value="<?php echo $user['gender']; ?>"><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
        <label>Address:</label><br>
        <input type="text" name="address" value="<?php echo $user['address']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
