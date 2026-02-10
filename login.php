<?php
session_start();
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // We are using $pdo because that is how you defined it in your db.php
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['full_name'] = $user['full_name'];
        echo "<script>alert('Success! Welcome " . $user['full_name'] . "'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Incorrect Email or Password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Food System</title>
    <style>
        body { font-family: Arial; background-color: #f4f4f4; text-align: center; padding-top: 50px; }
        .login-box { background: white; width: 300px; margin: auto; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px gray; }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>





