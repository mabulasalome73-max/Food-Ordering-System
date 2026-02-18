<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Make sure your database name is correct here
$conn = mysqli_connect("localhost", "root", "", "food_ordering_system");

if (isset($_POST['submit_order'])) {

    $user_id = $_POST['user_id']; // Here we take the ID (11, 12, etc.)
    $total_amount = $_POST['price'];
    $status = 'pending';

    // We are using the column names that exist in your database
    $sql = "INSERT INTO orders (user_id, total_amount, status) 
            VALUES ('$user_id', '$total_amount', '$status')";

    if (mysqli_query($conn, $sql)) {

        echo "<script>
                alert('Order added successfully!');
                window.location.href='admin_dashboard.php';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order - Admin</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f6;
            padding: 40px;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #27ae60;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
        }

        button:hover {
            background: #219150;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="form-box">
        <h2>Add New Order</h2>

        <form method="POST">

            <label>Customer:</label>
            <select name="user_id" required>
                <option value="">-- Select Customer --</option>

                <?php
                // This fetches all customers with their IDs
                $users = mysqli_query($conn, "SELECT id, username FROM users");

                while ($row = mysqli_fetch_assoc($users)) {
                    echo "<option value='" . $row['id'] . "'>"
                        . $row['username'] . " (ID: " . $row['id'] . ")"
                        . "</option>";
                }
                ?>
            </select>

            <label>Total Price (Tsh):</label>
            <input type="number" name="price" placeholder="Example: 5000" required>

            <button type="submit" name="submit_order">SAVE ORDER</button>

        </form>

        <a href="admin_dashboard.php" class="back-link">← Cancel and Go Back</a>

    </div>

</body>
</html>
