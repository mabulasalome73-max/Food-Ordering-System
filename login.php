<?php
// Start of the file
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// Start session securely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if login button is clicked
if (isset($_POST['login'])) {

    // Use trim() to clean email and password inputs
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // NOTE: We are NOT checking the database here.
    // We are using fixed credentials directly.
    if ($user === "mabulasalome73@gmail.com" && $pass === "12345678") {

        $_SESSION['admin_logged_in'] = true;

        echo "<script>
                alert('Login Successful! Welcome Admin.');
                window.location.replace('admin_dashboard.php');
              </script>";
        exit();

    } else {

        echo "<script>
                alert('Error: Email or Password is incorrect!');
                window.location.replace('login.php');
              </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #27ae60;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background: #219150;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Admin Login</h2>

        <form method="POST" action="login.php">
            <input type="email" name="username" value="mabulasalome73@gmail.com" required>
            <input type="password" name="password" placeholder="Enter 12345678" required>
            <button type="submit" name="login">LOGIN NOW</button>
        </form>

    </div>

</body>
</html>
