<?php 

while ($row = mysqli_fetch_assoc($query)) {
    // Corrected SQL query with proper parentheses
    $sql2 = "SELECT * FROM messages 
             WHERE (incoming_msg_id = {$row['unique_id']} 
                    OR (outgoing_msg_id = {$row['unique_id']} AND outgoing_msg_id = {$outgoing_id}) 
                    OR incoming_msg_id = {$outgoing_id}) 
             ORDER BY msg_id DESC LIMIT 1";

    // Execute the second query
    $query2 = mysqli_query($conn, $sql2);
    
    // Check if query executed successfully
    if ($query2) {
        $row2 = mysqli_fetch_assoc($query2);
        
        // Ensure $row2 is not empty
        $result = (mysqli_num_rows($query2) > 0) ? $row2['msg'] : "No messages available";
        
        // Truncate message if needed
        $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
        
        // Check if the message is from the current user
        $you = (isset($row2['outgoing_msg_id']) && $outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";

        // Check user's status
        $offline = ($row['status'] == "offline now") ? "offline" : "";

        // Hide current user from the list
        $hid_me = ($outgoing_id == $row['unique_id']) ? "hide" : "";

        // Build output HTML
        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
            <div class="content">
                <img src="php/images/' . $row['img'] . '" alt="">
                <div class="details">
                    <span>' . htmlspecialchars($row['fname']) . ' ' . htmlspecialchars($row['lname']) . '</span>
                    <p>' . htmlspecialchars($you . $msg) . '</p>
                </div>
            </div>
            <div class="status-dot ' . htmlspecialchars($offline) . '">
                <i class="fas fa-circle"></i>    
            </div>
        </a>';
    } else {
        // Handle query execution error
        $output .= '<p>Error fetching messages.</p>';
    }
}
?>
