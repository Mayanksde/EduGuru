<?php
include("database/db.php"); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir_pdf = "uploads/notes/";
    $email = $_SESSION['email'];
    $subject = $_SESSION['subject'];
    
    // File path
    $pdf_path = $target_dir_pdf . basename($_FILES["notes"]["name"]);

    // Validation
    $isPDF = mime_content_type($_FILES["notes"]["tmp_name"]) === "application/pdf";
    $validSize = $_FILES["notes"]["size"] <= 10000000; // 10MB for PDF

    if ($isPDF && $validSize) {
        // Upload PDF
        if (move_uploaded_file($_FILES["notes"]["tmp_name"], $pdf_path)) {
            // Save path to database
            $sql = "INSERT INTO course (email,pdf_path,course_name) VALUES ('$email','$pdf_path','$subject')";
            if (mysqli_query($connect, $sql)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Database error: " . mysqli_error($connect);
            }
        } else {
            echo "Error uploading PDF.";
        }
    } else {
        echo "Invalid file format or size.";
    }
}
?>

























<?php
// include("database/db.php"); 
// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $target_dir_pdf = "uploads/notes/";
//     $email = $_SESSION['email'];
//     $subject = $_SESSION['subject'];
    
//     // File path
//     $pdf_path = $target_dir_pdf . basename($_FILES["notes"]["name"]);

//     // Validation
//     $isPDF = mime_content_type($_FILES["notes"]["tmp_name"]) === "application/pdf";
//     $validSize = $_FILES["notes"]["size"] <= 10000000; // 10MB for PDF

//     if ($isPDF && $validSize) {
//         // Upload PDF
//         if (move_uploaded_file($_FILES["notes"]["tmp_name"], $pdf_path)) {
//             // Save path to database
//             $sql = "INSERT INTO course (email,pdf_path,course_name) VALUES ('$email','$pdf_path','$subject')";
//             echo mysqli_query($connect, $sql) ? "Upload successful and path saved." : "Database error: " . mysqli_error($connect);
//         } else {
//             echo "Error uploading PDF.";
//         }
//     } else {
//         echo "Invalid file format or size.";
//     }
// }
?>
