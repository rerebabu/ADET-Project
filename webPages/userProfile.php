<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="userProfileAssets/Logo.png">
    <link rel="stylesheet" href="userProfile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <title>TalaPuso</title>
</head>
<body>
    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="userProfileAssets/Logo.png" alt="TalaPuso Logo">
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

        <div class="mainContent">
            <div class="profileSettings">
                <div class="profileTitle">
                    <h2 class="title">Profile</h2>
                    <button class="saveChanges">Save Changes</button>
                </div>

            <div class="profileSection">
                <img src="asset/user2.jpg" alt="User Profile" class="userPFP">
                <button class="uploadPicBtn"><i class="fi fi-ss-pen-circle"></i></button>
                <div class="floatingName">
                    <input type="text" id="name" placeholder=" ">
                    <label for="name">name</label>
                </div>           
            </div>

            <div class="profileForm">
                <div class="floatingInput">
                    <input type="text" id="username" placeholder=" ">
                    <label for="username">username</label>
                </div>
            
                <div class="floatingInput">
                    <input type="password" id="password" placeholder=" ">
                    <label for="password">password</label>
                </div>
            
                <div class="floatingInput">
                    <input type="email" id="email" placeholder=" ">
                    <label for="email">PUP email</label>
                </div>
            
                <div class="floatingInput">
                    <select id="gender" name="gender">
                        <option value="" disabled selected> </option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                    <label for="gender">gender</label>
                </div>
            
                <button class="logOut">log out</button>
            </div>
            </div>
        </div>

        <div class="profilePicOverlay" id="profilePicOverlay">
            <button class="closeprofilePicOverlay closeBtn"><i class="fi fi-ss-circle-xmark"></i></button>
            <div class="profilePicOverlayContent">

                <div class="profilePicTitle">
                    <h2>Select Profile Picture</h2>
                    <input type="file" name="profilePic" id="profilePic" accept="image/jpeg, image/jpg, image/png">
                </div>

                <div id="previewContainer">
                    <img class="previewImage" id="previewImage" src="" alt="Image Preview">
                </div>

                <a href="index.html"><button class="okBtn">OK</button></a>

            </div>
        </div>

    </div>

    <script src="userProfile.js"></script>
</body>
</html>
