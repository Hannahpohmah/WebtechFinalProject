<!DOCTYPE html>
<html lang="en">
<head>
    <title>HealthLine</title>
    <link rel="stylesheet" href="../g_css/home_register_style.css">
</head>
<body>
    <div class="pictures"> <img src="../g_img/bbg_2.jpeg" alt="Doctor 1" width="100%" height="100%"></div>
    <div class="overlay"></div>

    <div class="main">
        <div class="register" id="register-form">
            <form class="form" method="POST" action="../action/question_validate.php">
                <h2>Forgotten Password</h2>

                <!-- Security Questions -->
                <p class="security-question">Enter Email</p>
                <input type="email" name="email" placeholder="Enter your email" required >
                <p class="security-question">What is your mother's maiden name?</p>
                <input type="text" name="security_answer_1" placeholder="Enter your answer" required>

                <p class="security-question">In what city were you born?</p>
                <input type="text" name="security_answer_2" placeholder="Enter your answer" required>

                <p class="security-question">What is the name of your first elementary school?</p>
                <input type="text" name="security_answer_3" placeholder="Enter your answer" required>

                <button type="submit" class="btnn">Proceed</button>        
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
