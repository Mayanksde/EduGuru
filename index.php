<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css_files/index_style.css">
</head>
<style>
    body{
        overflow: auto;
    }
</style>
<body>

    <?php include 'navbar.php'; ?>

    <div class="optionBtn">
            <button onclick="window.location.href='signup.html'">Become an Instructor</button>
            <button onclick="window.location.href='show_courses.php'">Explore Courses</button>
        </div>
    
    <div class="container">
        <div class="random-content">
            <h2>Empowering Your Education</h2>
            <p>Explore our wide range of courses and become an expert in your field with personalized learning. Join our vibrant community of passionate learners and dedicated instructors today....</p>
        </div>
        
        
        <div class="design-element">

        <div class="boxes">
            <div class="box1">
            <pre class="codeText">
            &lt;!DOCTYPE html&gt;<br>
            &lt;html&gt;<br>
            &lt;head&gt;&lt;title&gt;Example&lt;/title&gt;&lt;/head&gt;<br>
            &lt;body&gt;<br>
            &lt;h1&gt;&lt;a href="/"&gt;Header&lt;/a&gt;&lt;/h1&gt;<br>
            &lt;nav&gt;&lt;a href="one/"&gt;One&lt;/a&gt;&lt;/nav&gt;<br>
            &lt;a href="two/"&gt;Two&lt;/a&gt;<br>
            &lt;a href="three/"&gt;Three&lt;/a&gt;<br>
            &lt;/body&gt;<br>
            &lt;/html&gt;
            </pre>
            </div>
            <div class="box2">
                    <h1>Start <span class="typedText"></span> In Seconds</h1>
                    <p class="contentText"></p>
                    <button class="button-continue">Continue Lesson</button>
                    <button class="button-learn">Learn more →</button>
            </div>
        </div>


            <div class="about">
                <h3>About us...</h3>
                <p>

                    Education is the cornerstone of a prosperous society, opening doors to opportunities and fostering growth in every corner of the world. It shapes minds, builds character, and ignites a passion for lifelong learning. At [Your Website Name], we believe that education should be accessible to everyone, regardless of their background or financial situation. <br> <br>

                    We are dedicated to empowering learners by providing high-quality education through the expertise of our talented teachers—all for free. Our platform is built on the principle that knowledge should be shared, and education should be a right, not a privilege. In a world where information is power, we strive to make that power available to all. <br><br>

                    Our team of educators is passionate about teaching and committed to making a difference. They bring years of experience and a deep understanding of their subjects, ensuring that our learners receive the best possible education. Whether you are a student seeking to excel in your studies, a professional looking to enhance your skills, or simply someone with a thirst for knowledge, our platform offers a wide range of courses to meet your needs. <br><br>

                    We understand that education is not just about memorizing facts and passing exams. It's about critical thinking, problem-solving, and developing the ability to learn independently. Our courses are designed to engage, inspire, and challenge learners to reach their full potential. <br><br>

                    Join us in our mission to democratize education and unlock the power of knowledge for everyone. Together, we can build a brighter future, one learner at a time.
                </p>
            </div>

            <div class="boxes">
    <div class="box1">
        <pre class="codeText">
            &lt;!DOCTYPE html&gt;<br>
            &lt;html&gt;<br>
            &lt;head&gt;&lt;title&gt;Example&lt;/title&gt;&lt;/head&gt;<br>
            &lt;body&gt;<br>
            &lt;h1&gt;&lt;a href="/"&gt;Header&lt;/a&gt;&lt;/h1&gt;<br>
            &lt;nav&gt;&lt;a href="one/"&gt;One&lt;/a&gt;&lt;/nav&gt;<br>
            &lt;a href="two/"&gt;Two&lt;/a&gt;<br>
            &lt;a href="three/"&gt;Three&lt;/a&gt;<br>
            &lt;/body&gt;<br>
            &lt;/html&gt;
        </pre>
    </div>
    <div class="box2">
        <h1>Start <span class="typedText"></span> In Seconds</h1>
        <p class="contentText"></p>
        <button class="button-continue">Continue Lesson</button>
        <button class="button-learn">Learn more →</button>
    </div>
</div>

        </div>
    </div>

    <script>
        function checkLogin() {
            <?php if (!isset($_SESSION['email'])): ?>
                window.location.href = 'signup.html';
            <?php else: ?>
                window.location.href = 'profile.php';
            <?php endif; ?>
        }

        document.addEventListener("DOMContentLoaded", function() {
    const boxes = document.querySelectorAll('.boxes');
    
    boxes.forEach(function(box) {
        const typedTextSpan = box.querySelector('.typedText');
        const contentText = box.querySelector('.contentText');

        const textArray = ["Coding", "Programming", "Learning"];
        const mainText = "Go ahead, give it a try. Our hands-on learning environment means you'll be writing real code from your very first lesson.";
        let textArrayIndex = 0;
        let charIndex = 0;

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, 150);
            } else {
                setTimeout(erase, 1000);
            }
        }

        function erase() {
            if (charIndex > 0) {
                typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(erase, 100);
            } else {
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, 500);
            }
        }

        function typeMainText() {
            let index = 0;
            function writeMainText() {
                if (index < mainText.length) {
                    contentText.textContent += mainText.charAt(index);
                    index++;
                    setTimeout(writeMainText, 50);
                }
            }
            writeMainText();
        }

        type();
        typeMainText();
    });
});

    </script>
</body>
</html>
