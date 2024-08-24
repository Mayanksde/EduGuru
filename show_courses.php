<?php
include 'database/db.php';

$sql = "SELECT * FROM course";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Courses</title>
    <!-- <link rel="stylesheet" href="css_files/show_courses_style.css">  -->
</head>
<style>
    /* show_courses_style.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #000532;
}

.courses-list {
    width: 50%;
    margin: 2rem auto;
    /* padding: 2rem; */
    background-color: #000218;
    box-shadow: 0 0 100px rgba(201, 194, 255, 0.1);
    border-radius: 8px;
    /* border: 5px solid black; */
    border: 1px solid blue;
}

.courses-list h2 {
    text-align: center;
    color: rgb(232, 230, 255);
    margin-bottom: 2rem;
    
}

.courses-list ul {
    list-style-type: none;
    padding: 0;
    /* border: 5px solid rgb(217, 103, 103); */
}

.courses-list li {
    /* margin-bottom: 2rem; */
    text-align: center;
    /* border: 5px solid black; */
}

.courses-list h3 {
    font-size: 1.5rem;
    color: rgb(232, 230, 255);
    margin-bottom: 1rem;
}

.pdf-preview {
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
}

.pdf-preview object {
    width: 15rem;
    height: 8rem;
    /* border: 1px solid #ccc; */
    border-radius: 4px;
}

.courses-list a {
    display: inline-block;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.courses-list a:hover {
    background-color: #0056b3;
}
.about p {
                font-size: 1.2em;
                color: #e7f3ff;
                line-height: 1.5;
            }
</style>
<body>
    <?php include 'navbar.php'; ?>

    <div class="about">
                <p>

                "Explore our diverse range of courses designed to meet your learning needs. Whether you're looking to advance your career, pick up a new skill, or dive deeper into a subject you're passionate about, you'll find the perfect course here. Each course is crafted by industry experts to provide you with practical knowledge and hands-on experience. Take the next step in your learning journey and unlock your potential today. Browse through our offerings, find the course that fits your goals, and start learning at your own pace. Your path to success begins here!"
                </p>
            </div>

    <div class="courses-list">
        <h2>Available Courses</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>

            
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <li>
                        <h3><?php echo htmlspecialchars($row['course_name']); ?></h3>
                        <div class="pdf-preview">
                            <object data="<?php echo htmlspecialchars($row['pdf_path']); ?>#page=1" type="application/pdf"></object>
                        </div>
                        <a href="<?php echo htmlspecialchars($row['pdf_path']); ?>" target="_blank">Download Notes</a>
                    </li>
                <?php endwhile; ?>
            </ul>


        <?php else: ?>
            <p>No courses available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
