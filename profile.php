<?php
include("database/db.php"); // Include database connection
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: signup.html");
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = mysqli_real_escape_string($connect, $_POST['name']);
    $new_password = mysqli_real_escape_string($connect, $_POST['password']);
    $new_subject = mysqli_real_escape_string($connect, $_POST['subject']);

    $sql = "UPDATE instructor SET name='$new_name', password='$new_password', subject='$new_subject' WHERE email='$email'";

    if ($connect->query($sql) === TRUE) {
        // Update session variables
        $_SESSION['name'] = $new_name;
        $_SESSION['subject'] = $new_subject;

        // Show the updated profile and hide the form
        echo "<script>
                document.getElementById('profile_details').style.display = 'block';
                document.getElementById('update_profile').style.display = 'none';
              </script>";
    } else {
        echo "Error updating profile: " . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css_files/profile_style.css">
</head>
<body>
    <header>
        <?php include('navbar.php'); ?>
    </header>

    <main>
        <div id="profile_details">
            <h1>Profile</h1>
            <p>Name: <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <p>Subject: <?php echo htmlspecialchars($_SESSION['subject']); ?></p>

            <button id="logout_button"><a href="logout.php">Logout</a></button>
            <button id="update_profile_button">Update profile</button>
        </div>

        <!-- Update Profile Form -->
        <form id="update_profile" method="post" action="profile.php">
            <h2>Update Profile</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['name']); ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($_SESSION['subject']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>
    </main>

    <script>
        // Initially hide the update profile form
        document.getElementById('update_profile').style.display = 'none';

        // Show the update profile form and hide current profile details
        document.getElementById('update_profile_button').addEventListener('click', function() {
            document.getElementById('profile_details').style.display = 'none';
            document.getElementById('update_profile').style.display = 'block';
        });
    </script>
</body>
</html>
