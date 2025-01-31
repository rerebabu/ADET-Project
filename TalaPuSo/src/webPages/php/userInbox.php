<?php
    session_start();
    include('connect.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/userInboxAssets/Logo.png">
    <link rel="stylesheet" href="../styles/userInbox.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="script.js" defer></script>
    <title>Inbox</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sideBar" id="sideBar">
            <div class="logoClass">
                <img src="../assets/userInboxAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <div class="profileContent">
                <div class="imgClass"></div>
                <div class="welcome">Welcome,<?php
                if(isset($_SESSION['username'])){
                    $userName=$_SESSION['username'];
                    $query=mysqli_query($conn, "SELECT * FROM `tuserinfo` WHERE tuserinfo.username='$userName'");
                    while($row=mysqli_fetch_array($query)){
                        echo $row['userName'];
                    }
                }
                ?></div>
                <a href="../php/logout.php">Log Out</a>
            </div>
            <div class="sidebarFunctions">
                <a href="../php/userHomePage.php"><button>
                    <i class="fi fi-rr-home-heart"></i>
                    <span>Home</span>
                </button></a>
                <a href="../php/animalGallery.php"><button>
                    <i class="fi fi-rr-file-image"></i>
                    <span>Gallery</span>
                </button></a>
                <a href="../php/reportHistory.php"><button>
                    <i class="fi fi-rr-time-past"></i>
                    <span>History</span>
                </button></a>
                <a href="../php/userInbox.php"><button>
                    <i class="fi fi-rr-message-heart"></i>
                    <span>Inbox</span>
                </button></a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="mainContent">
            <div class="inbox">
                <h2>Inbox</h2>
                <div class="messageList">
                    <div class="messageItem" onclick="openChat('Admin Reynalyn')">
                        <div class="grayCircle"></div>
                        <div class="messageDetails">
                            <div class="messageHeader"><span class="chatUserName">Admin Reynalyn</span></div>
                            <div class="messageSnippet">Summary of Report...</div>
                        </div>
                    </div>
                    <div class="messageItem" onclick="openChat('Admin Marian')">
                        <div class="grayCircle"></div>
                        <div class="messageDetails">
                            <div class="messageHeader"><span class="chatUserName">Admin Marian</span></div>
                            <div class="messageSnippet">Summary of Report...</div>
                        </div>
                    </div>
                    <div class="messageItem" onclick="openChat('Admin Jhanice')">
                        <div class="grayCircle"></div>
                        <div class="messageDetails">
                            <div class="messageHeader"><span class="chatUserName">Admin Jhanice</span></div>
                            <div class="messageSnippet">Summary of Report...</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chatbox">
                <div class="chatHeader">
                    <button class="backButton" onclick="closeChat()">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="roundedArrow">
                            <path d="M15.5 4.5L8.5 12l7 7.5" stroke="#345B9C" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div class="grayCircle"></div>
                    <span id="chatUser" class="chatUserName">Admin Reynalyn</span>
                </div>
                <div class="chatMessages" id="chatMessages">
                    <div class="messageRow adminMessage">
                        <div class="grayCircle"></div>
                        <div class="messageContent">
                            <strong class="chatUserName">Admin Reynalyn:</strong> Hi! How can I help you today?
                        </div>
                    </div>
                    <div class="messageRow userMessage">
                        <div class="grayCircle"></div>
                        <div class="messageContent">
                            <strong class="chatUserName">You:</strong> Can you assist me with the report?
                        </div>
                    </div>
                </div>
                <div class="chatInput">
                    <input type="text" id="messageInput" placeholder="Type a message...">
                    <button onclick="sendMessage()">Send</button>
                </div>
            </div>
            
</body>
</html>
