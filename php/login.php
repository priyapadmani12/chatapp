<?php
session_start(); // Start the session for session variables

include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Password is not escaped, but hashed directly

    // Check if email and password are provided
    if (!empty($email) && !empty($password)) {
        // Query to fetch user from database
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify password using password_verify()
            $enc_pass = $row['password'];

            if (password_verify($password, $enc_pass)) {
                // Update user status to "Online"
                $status = "Online";
                $sql2 = "UPDATE users SET status='{$status}' WHERE unique_id = {$row['unique_id']}";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success"; // Successful login
                } else {
                    echo "Something went wrong. Please try again!";
                }
            } else {
                echo "Email or password is incorrect!";
            }
        } else {
            echo "{$email} - This email does not exist!";
        }
    } else {
        echo "All input fields are required!";
    }
}
?>
