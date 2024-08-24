<?php
include("database/db.php"); // Include database connection
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected options for each question
    $question1 = "What kind of teaching have you done before?";
    $question2 = "How much of a video 'pro' are you?";
    $question3 = "Do you have an audience to share your course with?";

    $answer1 = $_POST['question1'];
    $answer2 = $_POST['question2'];
    $answer3 = $_POST['question3'];
    $email = $_SESSION['email'];

    // Escape values to prevent SQL injection
    $question1 = $connect->real_escape_string($question1);
    $question2 = $connect->real_escape_string($question2);
    $question3 = $connect->real_escape_string($question3);
    $answer1 = $connect->real_escape_string($answer1);
    $answer2 = $connect->real_escape_string($answer2);
    $answer3 = $connect->real_escape_string($answer3);
    $email = $connect->real_escape_string($email);

    $sql = "INSERT INTO instructorsurvey (email, question1, question2, question3, answer1, answer2, answer3) 
            VALUES ('$email', '$question1', '$question2', '$question3', '$answer1', '$answer2', '$answer3')";

    if ($connect->query($sql) === TRUE) {
        header("Location: course.html");
        exit();
    } else {
        echo "Failed to save survey responses: " . $connect->error;
    }
}
?>
