<?php
session_start();
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $outgoing_id = $_SESSION['unique_id'];

    if (!empty($message)) {
        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')";
        if (mysqli_query($conn, $sql)) {
            echo 'Message sent successfully';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>
