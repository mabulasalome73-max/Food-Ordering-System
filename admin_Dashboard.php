<?php
// 1. Connect to Database
$conn = mysqli_connect("localhost", "root", "", "food_ordering_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. JOIN Query to fetch orders and customer names
$sql = "SELECT users.username, orders.amount, orders.order_status, orders.created_at 
        FROM users 
        JOIN orders ON users.id = orders.user_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Food Ordering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #27ae60;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status {
            font-weight: bold;
            color: #e67e22;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>ADMIN PANEL - ORDER LIST</h2>
    <p>Welcome, here you can see customers who have paid and the status of their orders.</p>

    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Amount (Tsh)</th>
                <th>Order Status</th>
                <th>Order Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row["username"] . "</td>
                            <td>" . number_format($row["amount"], 2) . "</td>
                            <td class='status'>" . $row["order_status"] . "</td>
                            <td>" . $row["created_at"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr>
                        <td colspan='4' style='text-align:center;'>
                            No orders found
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="index.php" style="text-decoration: none; color: blue;">
        ← Back to Home Page
    </a>
</div>

</body>
</html>
