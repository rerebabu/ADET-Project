<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="reportHistoryAssets/Logo.png">
    <link rel="stylesheet" href="reportHistory.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <title>Report History</title>
</head>
<body>

    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="reportHistoryAssets/Logo.png" alt="TalaPuso Logo">
            </div>
            <a href="userProfile.php">
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
                <a href="userHomePage.php"><button>
                    <i class="fi fi-rr-home-heart"></i>
                    <span>Home</span>
                </button></a>
                <a href="animalGallery.php"><button>
                    <i class="fi fi-rr-file-image"></i>
                    <span>Gallery</span>
                </button></a>
                <a href="reportHistory.php"><button>
                    <i class="fi fi-rr-time-past"></i>
                    <span>History</span>
                </button></a>
                <a href="userInbox.php"><button>
                  <i class="fi fi-rr-message-heart"></i>
                  <span>Inbox</span>
                </button></a>
            </div>
        </div>

        <div class="contentWrapper">
            <div class="reportTitleContainer">
                <div class="reportTitle">
                    <h2>Report History</h2>
                </div>
            </div>
            
            <div class="reportHistoCards">
                <!-- Card 1 -->
                <a href="#details" class="card">
                    <div class="cardContent">
                        <div class="topRow">
                            <h2 class="petCategory">cat</h2>
                            <span class="incidentStatus pending">pending</span>
                        </div>
                        <div class="incidentType injury">injury</div>
                    </div>
                </a>
            
                <!-- Card 2 -->
                <a href="#details" class="card">
                    <div class="cardContent">
                        <div class="topRow">
                            <h2 class="petCategory">dog</h2>
                            <span class="incidentStatus pending">pending</span>
                        </div>
                        <div class="incidentType lost">lost</div>
                    </div>
                </a>
            
                <!-- Card 3 -->
                <a href="#details" class="card">
                    <div class="cardContent">
                        <div class="topRow">
                            <h2 class="petCategory">dog</h2>
                            <span class="incidentStatus resolved">resolved</span>
                        </div>
                        <div class="incidentType bite">bite</div>
                    </div>
                </a>

                <!--Add more cards here-->
            </div>                
        </div>

        <div class="floatingBtnClass">
            <a href="/userForm/index.html"><button class="floatingBtn">
                <i class="fi fi-br-plus"></i>
            </button></a>
        </div>
    </div>
</body>
</html>
