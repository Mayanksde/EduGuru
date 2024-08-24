<?php
session_start();
include("database/db.php");

if($_POST['email'])
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM instructor WHERE email='$email' AND password='$password'";

    $result = $connect->query($sql);

    if($result->num_rows > 0)
    {
        // echo "User found";
        $user = $result->fetch_assoc();

        $_SESSION['id']= $user['id'];
        $_SESSION['name']= $user['name'];
        $_SESSION['email']= $user['email'];
        $_SESSION['subject'] = $user['subject'];

        header("Location: course.html");
    }
    else{
        echo "User not found";
    }
}
?>
