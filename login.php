
<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    // code...
    header("location: user.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat App</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        /* Additional styling for login form */
        body {
            background-color: #add8e6;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .wrapper {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form.login header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form.login .field {
            margin-bottom: 20px;
        }
        .form.login .field input[type="text"],
        .form.login .field input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form.login .field input[type="password"] {
            position: relative;
        }
        .form.login .field input[type="password"] + .fas {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }
        .form.login .field input[type="password"] + .fas:hover {
            color: #333;
        }
        .form.login .field.button {
            text-align: center;
        }
        .form.login .field.button input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #ADD8E6;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .form.login .field.button input[type="submit"]:hover {
            background-color:  #808080;
        }
        .form.login .link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .form.login .link a {
            color: #007bff;
            text-decoration: none;
        }
        .form.login .link a:hover {
            text-decoration: underline;
        }
        .error-text {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
            display: none; /* Initially hidden */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter Your Email">
                </div>

                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                    <!-- <i class="fas fa-eye"></i> -->
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="Continue to chat">
                </div>

            </form>
            <div class="link">Not yet signed up?<a href="index.php"> Signup now</a></div>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
