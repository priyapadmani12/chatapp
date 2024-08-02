<?php
session_start();
include_once "php/config.php";

if (!isset($_SESSION['unique_id'])) {
    header("location:login.php");
    exit(); // Always exit after a redirection
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $outgoing_id = $_SESSION['unique_id'];

    if (!empty($message)) {
        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')";
        if (mysqli_query($conn, $sql)) {
            // Message inserted successfully
        } else {
            // Handle insertion error
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id={$user_id}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
} else {
    header("location:user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" defer></script> <!-- For icons -->
</head>

<body>
    <?php include_once "header.php"; ?>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" alt="User Image">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box" id="chat-box">
    <!-- Chat messages will go here -->
</div>
<form method="POST" class="typing-area" id="message-form">
    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id ?>" hidden>
    <input type="text" name="message" class="input-field" id="message-input" placeholder="Type a message here..." autocomplete="off">
    <button type="submit"><i class="fab fa-telegram-plane"></i></button>
</form>

        </section>
    </div>
    <script src="js/chat.js"></script>
</body>

</html>
