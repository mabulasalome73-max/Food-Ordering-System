<?php
$conn = mysqli_connect("localhost", "root", "", "food_ordering_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// We use * to select everything available
$sql = "SELECT users.username, orders.* FROM users 
        JOIN orders ON users.id = orders.user_id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
            background: #f4f4f4; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
        th { 
            background: #27ae60; 
            color: white; 
        }
    </style>
</head>
<body>
    <h2>ADMIN PANEL - ORDER LIST</h2>

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Other Order Data</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>";
            // This will print everything available in the orders table so you can see the correct column names
            foreach ($row as $key => $value) {
                if ($key != 'username') {
                    echo "<strong>$key:</strong> $value | ";
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.php">Back Home</a>
</body>
</html>
