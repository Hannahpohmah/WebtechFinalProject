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
            <form class="form" method="POST" action="../action/Reset_password.php">
                <h2>Forgotten Password</h2>
                
                <input type="password" name="newpassword" placeholder="Enter New Password Here" required >
                <input type="password" name="confirmpassword" placeholder="Retype your password" required>


                <button type="submit" class="btnn">Set Password</button>        
            </form>
        </div>
    </div>

    <style>
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .error-input {
            border-color: red;
        }

    </style>

    <script src="../g_js/home_set_new_password_script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
