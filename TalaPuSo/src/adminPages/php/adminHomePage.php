<?php
session_start();
include ('../webPages/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="adminHomePageAssets/Logo.png">
    <link rel="stylesheet" href="adminHomePage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Admin</title>
</head>
<body>

    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="adminHomePageAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <a href="index.html">
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

            <div class="latestSection">
                <div class="latestTitle">
                    <div class="titleBtn">
                        <h2>What's Latest</h2>
                        <button onclick="openOverlay()">See All</button>
                    </div>
                    <h3 class="numberNotif">2</h3>
                </div>
            
                <div class="latestCards">
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Belmonte</span>
                            <p>Bacon is Injured</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
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
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Belmonte</span>
                            <p>Bacon is Injured</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Chaewon Magbanua</span>
                            <p>Shadow is Sick</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="adminHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                        <div class="cardContent">
                            <span class="userName">Haerin Magbanua</span>
                            <p>Pogi is Missing!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="databaseClass">
                <div class="databaseTitle">
                    <h2>Database</h2>
                </div>
                <div class="databaseContent">
                    <div class="catClass">
                        <img src="adminHomePageAssets/award.png" alt="Cat">
                        <div class="catTitle">
                            <h2 class="numberCats">30</h2>
                            <p>cats</p>
                        </div>
                    </div>

                    <div class="dogClass">
                        <img src="adminHomePageAssets/dog-food (2).png" alt="Cat">
                        <div class="dogTitle">
                            <h2 class="numberDogs">40</h2>
                            <p>dogs</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="notifClass">
                <div class="notifTitle">
                    <h2>Notifications</h2>
                    <p class="numberNotif">4</p>
                </div>

                <div class="notifCard">
                    <img src="adminHomePageAssets/user1.jpg" alt="User Profile" class="userProfile">
                    <div class="notifCaption">
                        <span class="Name">Chaewon Belmonte</span>
                        <span>reported a</span>
                        <span class="caseCategory">Severe Dog Injury</span>
                        <div><p class="notifMinutes">10mins</p></div>
                    </div>
                </div>

                <div class="notifCard">
                    <img src="adminHomePageAssets/user2.jpg" alt="User Profile" class="userProfile">
                    <div class="notifCaption">
                        <span class="Name">Haerin Magbanua</span>
                        <span>reported a</span>
                        <span class="caseCategory">Lost Dog</span>
                        <div><p class="notifMinutes">10mins</p></div>
                    </div>
                </div>

                <!--Add more Cards-->
            </div>
        </div>
    </div>
    <script src="adminHomePage.js"></script>
</body>
</html>