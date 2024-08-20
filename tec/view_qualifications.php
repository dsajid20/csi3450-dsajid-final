<?php
include 'db_connect.php';

$sql = "SELECT * FROM Qualification";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Code</th><th>Description</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["code"]. "</td><td>" . $row["name"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
