<?php
include '../settings/connection.php'; 
include('../function/select_category_fxn.php');
include('../function/select_role.php');
include('../action/fetchQuestion.php');

$questions = getAllquestions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home maintenance</title>
    <style>

        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif; 
        }

        body{
            width: 110%;
            height: 100vh;
            background-color: #fff; 
        }

        .main {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -35%);
        }

        .pictures {
            position: relative;
            background-size: cover;
            background-position: center;
            width: 140%;
            height: 140%;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 140%;
            height: 140%;
            background: rgba(0, 0, 0, 0.5); 
        }


        .form h2 {
            width: 100%;
            text-align: center;
            color: rgb(31, 31, 86); 
            font-size: 22px;
            background-color: rgb(148, 148, 11);
            border-radius: 10px;
            margin: 0;
            padding-top: 10px;
            vertical-align: middle;
        }


        .form input[type="radio"] {
            margin: 10px 5px 0 0;
            width: 50%;
        }

        .form input:focus, .form select:focus {
            outline: none;
            
        }

        ::placeholder {
            color:rgb(148, 148, 11);
        }

        .btnn {
            width: 100%;
            height: 40px;
            background: rgb(148, 148, 11); 
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
        }

        .btnn:hover {
            background: #fff;
            color: #64121f;
        }

        .form .link {
            font-size: 17px;
            padding-top: 20px;
            text-align: center;
            color:#fff;
        }

        .form .link a {
            text-decoration: none;
            color:black;
            text-align: center;
        }



        .security-question {
            color: #fff;
            margin-top: 20px; 
            font-size: 15px;
            width: 100%;
            font-family: 'Times New Roman', Times, serif;
        }

        .form {
            width: 600px; 
            height: 730px;
            margin: auto; 
            background: rgb(8, 43, 8);
            border-radius: 10px;
            padding: 25px;
            display: flex; 
            flex-wrap: wrap;
            justify-content: space-between; 
        }

        .form input{
            width: calc(50% - 20px); 
            height: 30px;
            background: transparent;
            border-bottom: 1px solid #64121f;
            border-top: none;
            border-right: none;
            border-left: none;
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 20px;
        } 
        .form select {
            width: calc(50% - 20px); 
            height: 30px;
            background: black;
            border-bottom: 1px solid #64121f;
            border-top: none;
            border-right: none;
            border-left: none;
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 20px;
        }

        .form .gender {
            width: 100%; 
            color: red;
            margin-top: 20px;

        }

        .form input[type="radio"] {
            width: 100%; 
            margin-top: 20px;
            

        }

        .form .security-question,
        .form input[type="text"] {
            width: 100%; 
            margin-top: 20px;
        }

        .form .security-question {
            width: 100%;
            font-family: Arial; /* Specify font-family instead of just font */
        }


    </style>
</head>
<body>
    <div class="pictures"> <img src="" width="100%" height="100%"></div>
    <div class="overlay"></div>

    <div class="main">
        <div class="register" id="register-form">
            <form action="../action/register_action.php" method="POST" class="form" onclick=return validateform()>
                <h2>Register</h2>
                <input type="text" name="fname" placeholder="Enter your first name" required>
                <input type="text" name="lname" placeholder="Enter your last name" required>
                
                <div class="gender">
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>

                
                <div class="gender">
                    <select name="role" id="role" required onchange="toggleCategoryField()">
                        <option value="">Select a role</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="categoryPopup" class="gender" style="display: none;" required>
                    <select name="category" id="category">
                        <option value="">Select a category</option>
                            <?php foreach ($categories as $cat) : ?>
                                <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

            
                <input type="phone_number" name="phone_number" placeholder="Enter your phone_number" required>
                <input type="email" name="email" placeholder="Enter Email Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">
                <input type="password" name="confirmpassword" placeholder="Retype your password" required pattern="^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$">
                <input type="street_adddress" name="street_adddress" placeholder="Enter your address" required>
                <!-- Security Questions -->

                <?php foreach ($questions as $question): ?>
                    <div class="security-question-item">
                        <p class="security-question"><?= htmlspecialchars($question['questionText']) ?></p>
                        <input type="hidden" name="question_id[]" value="<?= htmlspecialchars($question['questionId']) ?>">
                        <input type="text" name="security_answer[]" placeholder="Enter your answer" required>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btnn">Register</button>
                <!-- <input type="submit" class="btnn" value="Register"> -->
            
                <p class="link" style="vertical-align: middle;">Already have an account?<br>
                    Sign in<a href="../g_view/home.php"> here</a></p>

            
        </div>
    </div>
    <script>
        function toggleCategoryField() {
            var role = document.getElementById("role").value;
            var categoryField = document.getElementById("categoryPopup");
            if (role === "Service Provider") {
                categoryField.style.display = "block";
            } else {
                categoryField.style.display = "none";
            }
        }
</script>
</body>

</html>

