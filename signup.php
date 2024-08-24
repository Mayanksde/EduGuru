<?php
session_start();
include './database/db.php';

if(isset($_POST['name']))
{

    // echo "working";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $subject = $_POST['subject'];


    $sql = "INSERT INTO instructor (name, email, password, subject) VALUES ('$name', '$email', '$password', '$subject')";

    if ($connect->query($sql)===TRUE) {

        // echo "Data inserted";
        $_SESSION['id'] = $connect->insert_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['subject'] = $subject;

        header("Location: homeInstructor.html");
        exit();
    }
    else{
        echo "data not insertd";
    }
}
else{
    echo "Data not inserted....";
}
?>



