<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error executing query: " . $conn->error;
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='px-6 py-2'>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td class='px-6 py-2'>" . htmlspecialchars($row["gender"]) . "</td>";
        echo "<td class='px-6 py-2'>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td class='px-6 py-2'>" . htmlspecialchars($row["address"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

$conn->close();
?>
