<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="adminAssets/Logo.png">
    <link rel="stylesheet" href="adminNotif.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Notifications | Admin</title>
</head>
<body>

    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="adminAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <a href="/admin/adminProfile/adminProfile.html">
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
                <a href="logout.php">Log Out</a>
            </div>
            </a>

            <div class="sidebarFunctions">
                <a href="adminHomePage.php"><button>
                    <i class="fi fi-rr-home-heart"></i>
                    <span>Home</span>
                </button>
                </a>

                <a href="adminDbSelect.php"><button>
                    <i class="fi fi-rr-database"></i>
                    <span>Database</span>
                </button>
                </a>

                <a href="adminNotif.php"><button>
                    <i class="fi fi-rr-bell"></i>
                    <span>Notifications</span>
                </button>
                </a>
                
                <a href="adminReportPage.php"><button>
                    <i class="fi fi-rr-newspaper"></i>
                    <span>Reports</span>
                </button>
                </a>

                <a href="adminInbox.php"><button>
                    <i class="fi fi-rr-message-heart"></i>
                    <span>Inbox</span>
                </button>
                </a>
            </div>
        </div>

        <div class="mainContent">

            <div class="notifClass">
                <div class="notifTitle">
                    <h1>Notifications</h1>
                </div>

                <div class="notifBtn">
                    <button class="tab-link active" data-section="newTab">New</button>
                    <button class="tab-link" data-section="unreadTab">Unread</button>
                </div>

                <div id="newTab" class="tab-content active">
                    <div class="notifCard">
                        <img src="adminAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="notifCaption">
                            <span class="Name">Chaewon Belmonte</span>
                            <span>reported a</span>
                            <span class="caseCategory">Severe Dog Injury</span>
                            <div><p class="notifMinutes">10mins</p></div>
                        </div>
                    </div>
                    <div class="notifCard">
                        <img src="adminAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="notifCaption">
                            <span class="Name">Haerin Magbanua</span>
                            <span>reported a</span>
                            <span class="caseCategory">Lost Dog</span>
                            <div><p class="notifMinutes">10mins</p></div>
                        </div>
                    </div>
                </div>

                <div id="unreadTab" class="tab-content">
                    <div class="notifCard">
                        <img src="adminAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="notifCaption">
                            <span class="Name">Haerin Magbanua</span>
                            <span>reported a</span>
                            <span class="caseCategory">Sick Cat</span>
                            <div><p class="notifMinutes">5 mins</p></div>
                        </div>
                    </div>
                    <!-- Add more unread notifications here -->
                </div>

                <div id="popup" class="popup">
                    <div class="popupContent">
                        <span class="closeBtn"><i class="fi fi-ss-circle-xmark"></i></span>
                        <h2>New Report!</h2>
                        <p id="reportDetails">User reported a case.</p>
                        <div class="popupActions">
                            <button class="acceptBtn">accept</button>
                            <button class="rejectBtn">reject</button>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <script src="adminNotif.js"></script>
    
</body>
</html>