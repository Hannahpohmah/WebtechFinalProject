<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home maintenance app</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            margin: absolute;
            width: 100%;
            height: 100vh;
        }

        .main {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .pictures {
            position: relative;
            background-size: 100% auto;
            background-position: center;
            width: 100%;
            height: 100%;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 120%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the last value (0.5) for the desired transparency */
        }

        .navbar{
            width: 1200px;
            height: 75px;
            margin: auto;
        }

        .logo{
            color: rgb(8, 43, 8);
            font-size: 35px;
            font-family: Arial;
            padding-left: 20px;
            float: left;
            padding-top: 10px;
            margin-top: 5px
        }

        .menu{
            width: 400px;
            float: left;
            height: 70px;
        }

        ul{
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li{
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;
        }

        ul li a{
            text-decoration: none;
            color: rgb(8, 43, 8);
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover{
            color: #64121f;
        }

        .btn {
            width: 100px;
            height: 40px;
            background: rgb(148, 148, 11);
            border: 2px solid; /* Optional: change border color to match */
            margin-top: 13px;
            color: #fff; /* Text color */
            font-size: 15px;
            border-bottom-right-radius: 5px;
            border-bottom-right-radius: 5px;
            transition: 0.2s ease;
            cursor: pointer;
        }

        .btn:hover{
            color: #000;
        }

        .btn:focus{
            outline: none;
        }

        .srch:focus{
            outline: none;
        }

        .content{
            width: 1200px;
            height: auto;
            margin: auto;
            color: #fff;
            position: relative;
        }

        .content .par{
            padding-left: 20px;
            padding-bottom: 25px;
            font-family: Arial;
            letter-spacing: 1.2px;
            line-height: 30px;
        }

        .content h1{
            font-family: 'Times New Roman';
            font-size: 50px;
            padding-left: 20px;
            margin-top: 9%;
            letter-spacing: 2px;
            color:  rgb(8, 43, 8);
        }

        .content .cn{
            width: 160px;
            height: 40px;
            background:  rgb(148, 148, 11);
            border: none;
            margin-bottom: 10px;
            margin-left: -30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: .4s ease;
            
        }

        .content .cn a{
            text-decoration: none;
            color: #000;
            transition: .3s ease;
        }

        .cn:hover{
            background-color: #fff;
        }

        .content span{
            color: #64121f;
            font-size: 65px
        }

        .form{
            width: 250px;
            height: 360px;
            background: rgb(8, 43, 8);
            position: absolute;
            top: -20px;
            left: 870px;
            transform: translate(0%,-5%);
            border-radius: 10px;
            padding: 15px;
        }

        .form h2{
            width: 220px;
            font-family: sans-serif;
            text-align: center;
            color: #64121f;
            font-size: 22px;
            background-color: #fff;
            border-radius: 10px;
            padding: 8px;
        }

        .form input{
            width: 240px;
            height: 35px;
            background: transparent;
            border-bottom: 1px solid #64121f;
            border-top: none;
            border-right: none;
            border-left: none;
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 30px;
            font-family: sans-serif;
        }

        .form input:focus{
            outline: none;
        }

        ::placeholder{
            color: #fff;
            font-family: Arial;
        }

        .btnn{
            width: 240px;
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
        .btnn:hover{
            background:  rgb(148, 148, 11);
            color: #64121f;
        }
        .btnn a{
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .form .link{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            padding-top: 20px;
            text-align: center;
        }
        .form .link a{
            text-decoration: none;
            color:  rgb(148, 148, 11);
        }

        .icons a{
            text-decoration: none;
            color: #fff;
        }
        .icons ion-icon{
            color: #fff;
            font-size: 30px;
            padding-left: 14px;
            padding-top: 5px;
            transition: 0.3s ease;
        }
        .icons ion-icon:hover{
            color: #b3bdb2;
        }


                
        .image {
            position: relative;
            z-index: -1000;
            left: 37%;
            
            z-index: 10000;
        }

        .content-block {
                width:90.4%;
                background: #fff; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                padding: 20px;
                margin-left: 20px; /* Aligns the block to the left */
                margin-top: 50px; /* Top margin to push the block down */
                margin-bottom: 20px; /* Space below the block */
                font-size: 1.4em; /* Increased font size for better readability */
                color: #333; /* Dark gray text for better readability */
            }
            h1 {
                color: #4B0052; /* Stylish color for the heading */
                margin-bottom: 10px; /* Space between the heading and the text */
                font-size: 2em; /* Larger font size for heading */
                margin-top: 50px;
            }
            p {
                line-height: 1.6; /* Increased line height for better readability of paragraphs */
            }

    </style>

</head>
<body>

    <div class="overlay"></div>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo" >Home maintenance system</h2>

            </div>

            <div class="menu">
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="../about.php">ABOUT</a></li>
                    <li><a href="../contact.php">CONTACT</a></li>
                </ul>
            </div>

        </div> 
        <div class="content">
        <div class="content-block">
        <h1 style="margin-top: -10px;">Home Maintenance Platform</h1>
        <p>
            Welcome to our Home Maintenance Platform,<br>
            your one-stop solution for all home maintenance needs.<br>
            Easily find and hire verified service providers,<br>
            submit service requests, schedule regular maintenance,<br>
            and receive fast, reliable emergency services,<br>
            create personalized maintenance plans, and never miss<br>
            an appointment with our convenient reminders.
        </p>
        </div>

        <div class="image">
        <img src="./g_img/workers.png" style=    " transform: translateX(-20%); width: 520px; height: auto; object-fit: cover;" alt="Home Maintenance Worker">
        </div>


                <form class="form" action="./action/login_action.php" method="POST">
                    <h2>Login Here</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <button type="submit" class="btnn">Login</button>

                    <p class="link">
                        <a href="../g_view/home_forgotten_password.php">Forgotten password </a></p>

                    <p class="link">Don't have an account<br>
                    <a href="home_register.php">Sign up </a> here</a></p>
                    <br>

        <a  style= "margin-top: -10px; height: 100px:" href="../g_view/home_register.php"><button class="cn">JOIN US</button></a>

                </form>
                    </div>
                </div>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

