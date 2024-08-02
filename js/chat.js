document.addEventListener('DOMContentLoaded', function() {
    const chatBox = document.getElementById('chat-box');
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const incomingId = document.querySelector('.incoming_id').value;

    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function loadMessages() {
        fetch('php/fetch-messages.php?incoming_id=' + incomingId)
            .then(response => response.text())
            .then(data => {
                chatBox.innerHTML = data;
                scrollToBottom();
            })
            .catch(error => console.error('Error loading messages:', error));
    }

    messageForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(messageForm);

        fetch('php/send-message.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(() => {
            messageInput.value = ''; // Clear input field
            loadMessages(); // Reload messages
        })
        .catch(error => console.error('Error sending message:', error));
    });

    // Initial load of messages
    loadMessages();

    // Auto refresh messages every 2 seconds
    setInterval(loadMessages, 2000);
});
