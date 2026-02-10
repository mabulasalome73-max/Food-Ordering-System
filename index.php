<?php
session_start();

// This prevents users who are not logged in from accessing this page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Food System</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f8f9fa; margin: 0; text-align: center; }
        .header { background-color: #28a745; color: white; padding: 20px; font-size: 30px; text-align:center; margin-bottom:30px; border-radius:0 0 15px 15px; }
        .welcome-card { background: white; padding: 40px; margin: 50px auto; width: 50%; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-logout { background-color: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px; }
        .food-container {
    display: flex;   
    flex-wrap: wrap;  

    justify-content: center;   
    gap: 20px;              
    padding: 20px;
   
}

.food-card {
    .food-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }
    .order-btn:hover{background-color: #e5533d; transform: scale(1.05);
    transition: 0.2s;
}
    border: 1px solid #ddd;
    border-radius: 15px;
    width: 180px;
    text-align: center;
    padding: 15px;
    background-color: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Arial, sans-serif;
}

.food-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
}

.price {
    color: #28a745;
    font-weight: bold;
    font-size: 1.3em;
    margin: 10px 0;
}

.order-btn {
    background-color: #ff4500;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-weight: bold;
}

    </style>
</head>
<body>

    <div class="header">Food Ordering System</div>

    <div class="welcome-card">
        <h1>Welcome, <?php echo $_SESSION['full_name']; ?>!</h1>
        <p>You have successfully logged into your food account.</p>
        <p>This is where you will be able to view the menu and place your orders soon.</p>
        <a href="logout.php" class="btn-logout">Logout</a>
<div class="food-container">
    <div class="food-card">
        <img src="images/wali.jpg" alt="Rice with Beef">
        <h3>Rice with Beef</h3>
        <p>White rice with flavor and delicious beef.</p>
        <p class="price">Tsh 8,000</p>
    <a
    href="https://wa.me/255695517774?text=Hello,%20I%20would%20like%20to%20order%20Rice%20with%20Beef.%20please%20deliver%20to%20my%20location."
    class="order-btn"
    style="text-decoration: none; display: inline-block;"
>
    Order Now
</a>

    </div>

    <div class="food-card">
        <img src="images/chips.jpg" alt="Chicken and Chips">
        <h3>Chicken and Chips</h3>
        <p>Delicious chips served with local chicken.</p>
        <p class="price">Tsh 10,000</p>
    <a
    href="https://wa.me/255695517774?text=Hello,%20I%20would%20like%20to%20order%20Chicken%20and%20Chips.%20please%20deliver%20to%20my%20location."
    class="order-btn"
    style="text-decoration: none; display: inline-block;"
>
    Order Now
</a>

    </div>

    <div class="food-card">
        <img src="images/pilau.jpg" alt="Beef Pilau">
        <h3>Beef Pilau</h3>
        <p>Spiced rice with tender beef and kachumbari.</p>
        <p class="price">Tsh 12,000</p>
        <a
    href="https://wa.me/255695517774?text=Hello,%20I%20would%20like%20to%20order%20Beef%20Pilau.%20please%20deliver%20to%20my%20location."
    class="order-btn"
    style="text-decoration: none; display: inline-block;"
>
    Order Now
</a>

        
    </div>
    <div class="food-card">
    <img src="images/samaki.jpg" alt="Grilled Fish">
    <h3>Grilled Fish</h3>
    <p>Fresh tilapia grilled with coconut sauce.</p>
    <p class="price">Tsh 30,000</p>
 <a
    href="https://wa.me/255695517774?text=Hello,%20I%20would%20like%20to%20order%20Grilled%20Fish.%20please%20deliver%20to%20my%20location."
    class="order-btn"
    style="text-decoration: none; display: inline-block;"
>
    Order Now
</a>

</div>
<div class="food-card">
    <img src="images/juice.webp" alt="Fresh Fruit Juice">
    <h3>Fresh Fruit Juice</h3>
    <p>Natural juice made from fresh tropical fruits.</p>
    <p class="price">Tsh 4,500</p>
  <a
    href="https://wa.me/255695517774?text=Hello,%20I%20would%20like%20to%20order%20fruit%20juice.%20please%20deliver%20to%20my%20location."
    class="order-btn"
    style="text-decoration: none; display: inline-block;"
>
    Order Now
</a>

</div>



</div>
<footer style="background-color: #28a745; color: white; text-align: center; padding: 25px; margin-top: 40px; border-radius: 10px;">
    <h3>Order Now via WhatsApp</h3>
    <p>📞 Phone: +255 69551 7774</p>
    <p>📸 Instagram: @Menu_TZ</p>
    <p>&copy; 2026 Salome Food System. All rights reserved.</p>
</footer>











</body>
</html>


