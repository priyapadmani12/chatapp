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
        /* Additional styling for signup form */
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
        .form.signup header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form.signup .field {
            margin-bottom: 20px;
        }
        .form.signup .field input[type="text"],
        .form.signup .field input[type="password"],
        .form.signup .field input[type="email"],
        .form.signup .field input[type="file"] {
            width: calc(100% - 20px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form.signup .field.input label {
            margin-bottom: 6px;
            font-weight: bold;
            display: block;
            color: #555;
        }
        .form.signup .field.button {
            text-align: center;
        }
        .form.signup .field.button input[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 4px;
            background-color:  #ADD8E6;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
        .form.signup .field.button input[type="submit"]:hover {
            background-color:  #808080;
        }
        .form.signup .link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        .form.signup .link a {
            color: #007bff;
            text-decoration: none;
        }
        .form.signup .link a:hover {
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
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter New Password" required>
                </div>
                
                <div class="field image">
                    <label>Profile Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div>
                
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
                
            </form>
            <div class="link">Already Signed up?<a href="login.php"> Login now</a></div>
        </section>
    </div>
    <script type="text/javascript" src="js/pass-show-hide.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>
</body>
</html>
