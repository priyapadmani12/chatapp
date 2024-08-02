<?php
session_start();
include_once 'config.php';

if (isset($_GET['incoming_id']) && isset($_SESSION['unique_id'])) {
    $incoming_id = $_GET['incoming_id'];
    $outgoing_id = $_SESSION['unique_id'];

    $stmt = $conn->prepare("
        SELECT messages.*, users.img, users.fname, users.lname 
        FROM messages
        LEFT JOIN users ON users.unique_id = IF(messages.outgoing_msg_id = ?, messages.incoming_msg_id, messages.outgoing_msg_id)
        WHERE (messages.outgoing_msg_id = ? AND messages.incoming_msg_id = ?) 
        OR (messages.outgoing_msg_id = ? AND messages.incoming_msg_id = ?) 
        ORDER BY messages.msg_id ASC
    ");
    $stmt->bind_param("iiiii", $outgoing_id, $outgoing_id, $incoming_id, $incoming_id, $outgoing_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="message ' . ($row['outgoing_msg_id'] == $outgoing_id ? 'outgoing' : 'incoming') . '">';
        echo '<img src="php/images/' . htmlspecialchars($row['img']) . '" alt="User Image">';
        echo '<div class="message-details">';
        echo '<span>' . htmlspecialchars($row['fname']) . ' ' . htmlspecialchars($row['lname']) . '</span>';
        echo '<p>' . htmlspecialchars($row['msg']) . '</p>';
        echo '</div>';
        echo '</div>';
    }

    $stmt->close();
}
?>
