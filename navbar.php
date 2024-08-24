<?php
// Check if a session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already active
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css_files/navbar_style.css"> -->
</head>

<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #00032c;
    padding: 15px;
    color: white;
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; 
    border-bottom: 1px solid white;
}

.navbar .logo h1 {
    margin: 0;
    font-size: 24px;
}

.navbar-middle a, .navbar-right a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    font-size: 16px;
}

.navbar-middle a:hover, .navbar-right a:hover {
    text-decoration: underline;
}

.navbar-right a {
    border: 1px solid rgb(207, 118, 118);
    padding: 8px 12px;
    border-radius: 4px;
}

.navbar-right a:hover {
    background-color: rgb(204, 204, 204);
    color: #333;
}

body {
    padding-top: 70px; 
}

@media ( (min-width:351px) and (max-width:576px))
{
   .navbar-middle{
    display: none;
   }

}


</style>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h1>EduGuru</h1>
            </div>
            <div class="navbar-middle">
                <a href="index.php">Home</a>
                <a href="#">Moments</a>
                <a href="#">Notifications</a>
                <a href="#">Messages</a>
            </div>
            <div class="navbar-right">
                <?php if (isset($_SESSION['email'])): ?>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="signup.html">Profile</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
</body>
</html>
