<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="userHomePageAssets/Logo.png">
    <link rel="stylesheet" href="userReportDetails.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <title>Report Details</title>
</head>
<body>

    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="userHomePageAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <div class="profileContent">
                <div class="imgClass"></div>
                <div class="welcome">Welcome,</div>
                <div class="userName">Haerin</div>
            </div>

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
    
        <div class="mainContent">

            <div class="reportTitle">
                <a href="adminReportPage.php"><i class="fi fi-br-angle-left"></i></a>
                <div class="nameTitle">
                    <span class="firstName">Chaewon</span>
                    <span>'s</span>
                </div>
                <span>Report</span>
            </div>

            <div class="statusDiv">
                <span class="statusType pending">pending</span>
            </div>

            <div class="upperDiv">
                <div class="userClass">
                    <img src="/admin/asset/user1.jpg" alt="User Profile" id="userProfile">
                    <span class="Name">Chaewon Belmonte</span>
                </div>
                <p class="dateTimePost">January 2, 2025 11:59 PM</p>
                <hr>

                <div class="studentNoRow">
                    <p>Student/Faculty ID Number</p>
                    <span class="idNumber">2020-00000-MN-0</span>
                </div>

                <div class="ageRow">
                    <p>Age</p>
                    <span class="userAge">22 years old</span>
                </div>

                <div class="statusRow">
                    <p>Status</p>
                    <span class="userStatus">Student</span>
                </div>
            </div>

            <div class="middleDiv">
                <div class="animalRow">
                    <p>Type of Animal</p>
                    <span class="animalType dog">dog</span>
                </div>

                <div class="animalNameRow">
                    <p>Alleged Name of Animal</p>
                    <span class="animalName">Bacon</span>
                </div>

                <div class="animalDesRow">
                    <p>Specific Description of Animal</p>
                    <span class="animalDescription">Brown Fur</span>
                </div>
            </div>

            <div class="bottomDiv">
                <div class="severityRow">
                    <p>Severity of the Incident</p>
                    <span class="incidentSeverity severe">severe</span>
                </div>

                <div class="incidentRow">
                    <p>Type of Incident</p>
                    <span class="incidentType injury">injury</span>
                </div>

                <div class="dateTimeRow">
                    <p>Date and Time of Incident</p>
                    <span class="incidentDateTime">01/02/2025 7:00 PM</span>
                </div>

                <div class="photoRow">
                    <p>Proof of Incident</p>
                    <button class="photoBtn" onclick="openPhoto()"><span class="incidentProof">view photo</span></button>
                </div>
            </div>

        </div>
    </div>

    <script src="userReportDetails.js"></script>
    
</body>
</html>