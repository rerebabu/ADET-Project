function openChat(user) {
    document.querySelector('.inbox').style.display = 'none';
    document.querySelector('.chatbox').style.display = 'flex';
    document.getElementById('chatUser').textContent = user;
    document.getElementById('chatMessages').innerHTML = `
        <div class="messageRow adminMessage">
            <div class="grayCircle"></div>
            <div class="messageContent">
                <strong>${user}:</strong> Hello Admin, I reported a cat incident yesterday...
            </div>
        </div>
    `;
}

function closeChat() {
    document.querySelector('.chatbox').style.display = 'none';
    document.querySelector('.inbox').style.display = 'flex';
}


// Function to format the date as "Month Day, Year" (e.g., October 27, 2024)
function getFormattedDate() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return now.toLocaleDateString(undefined, options);
}

// Function to get the current time in HH:MM format
function getCurrentTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    return `${hours}:${minutes}`;
}

// Send Message
function sendMessage() {
    const input = document.getElementById('messageInput');
    const messageContainer = document.getElementById('chatMessages');

    if (input.value.trim() !== '') {
        // Check if a date header is already present
        if (!document.querySelector('.conversationDate')) {
            const dateHeader = `<div class="conversationDate">${getFormattedDate()}</div>`;
            messageContainer.innerHTML += dateHeader;
        }

        // Add admin message with time inside the text box
        const adminMessage = `
            <div class="messageRow userMessage">
                <div class="grayCircle"></div>
                <div class="messageContent">
                    <strong>You:</strong> ${input.value}
                    <div class="messageTime">${getCurrentTime()}</div>
                </div>
            </div>
        `;
        messageContainer.innerHTML += adminMessage;

        // Scroll to the bottom of the chat
        messageContainer.scrollTop = messageContainer.scrollHeight;

        // Clear input field
        input.value = '';

        // Simulate Admin Reply with time
        setTimeout(() => {
            const adminMessage = `
                <div class="messageRow adminMessage">
                    <div class="grayCircle"></div>
                    <div class="messageContent">
                        <strong>User:</strong> Okay, I will check on your page.
                        <div class="messageTime">${getCurrentTime()}</div>
                    </div>
                </div>
            `;
            messageContainer.innerHTML += adminMessage;

            // Scroll to the bottom of the chat
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }, 1000); // Delay admin response for realism
    }
}

// Add Event Listener for Enter Key
document.getElementById('messageInput').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        sendMessage(); // Call the sendMessage function
    }
});
