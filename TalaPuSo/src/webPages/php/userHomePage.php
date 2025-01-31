<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $userName = $_SESSION['username'];
    } else {
        $userName = "Guest"; // Default value if session is not set
    }
    
    include('connect.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/userHomePageAssets/Logo.png">
    <link rel="stylesheet" href="../styles/userHomePage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <title>TalaPuso</title>
</head>
<body>
    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="../assets/userHomePageAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <a href="userProfile.php">
            <div class="profileContent">
                <div class="welcome">Welcome, <?php echo htmlspecialchars($userName); ?></div>
                <a href="../php/logout.php">Log Out</a>
            </div>
            </a>
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

        <div class="mainContent">

            <div class="ptsClass">
                <div class="ptsContent">
                    <img src="..assets/userHomePageAssets/PawPts.png" alt="Paw">
                    <span class="ptsTally">0.00</span>
                    <span class="pts">pts</span>
                </div>
                <a href="../php/convertPage.php">
                <button class="convertBtn">
                        <i class="fi fi-rr-arrows-repeat"></i>
                        <span>Convert</span>
                </button>
                </a>
            
            </div>

            <div class="latestSection">
                <div class="latestTitle">
                    <h2>What's Latest</h2>
                    <button onclick="openOverlay()">See All</button>
                </div>
            
                <div class="latestCards">
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Belmonte</span>
                            <p>Bacon is Injured</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="overlay" id="overlay">
                <div class="overlayContent">
                    <button class="closeBtn" onclick="closeOverlay()">Close</button>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Belmonte</span>
                            <p>Bacon is Injured</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../assets/userHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="titleSection">
                <h2 class="galleryTitle">Gallery</h2>
                <h2 class="articleTitle">Articles</h2>
            </div>

            <div class="galleryArticleSec">
                <div class="gallerySection">
                    <a href="../php/animalGallery.php"><img src="../assets/userHomePageAssets/cat.png" alt="Cat Folder"></a>
                    <a href="../php/animalGallery.php"><img src="../assets/userHomePageAssets/dog.png" alt="Dog Folder"></a>
                </div>

                <div class="articleSection">
                    <!--Links of Articles-->
                </div>
            </div>


        </div>
    </div>
    
    <a href="../php/userFormPage.php" class="floating-btn">
    <i class="fi fi-rr-plus"></i>
</a>            
    <script src="../scripts/userHomePage.js"></script>
</body>
</html>
