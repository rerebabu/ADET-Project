<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="convertPageAsset/Logo.png">
    <link rel="stylesheet" href="convertPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <title>TalaPuso</title>
</head>
<body>
    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="convertPageAsset/Logo.png" alt="TalaPuso Logo">
            </div>
            <a href="/ProfilePage/index.html">
                <div class="profileContent">
                    <div class="imgClass"></div>
                    <div class="welcome">Welcome,</div>
                    <div class="userName">Haerin</div>
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
        <div class="convertPage">
            <div class="convertTitle">
                <h2>Convert Points</h2>
                <span>Convert to donate your points to our sintang furfriends</span>
            </div>

            <div class="ptsChoices">
                <button class="vetMedBtn">
                    <div class="vetMed">
                        <img src="convertPageAsset/veterinarian.png" alt="Vet and Med">
                        <p>vet & med fees</p>
                        <span>25 points</span>
                    </div>
                </button>

                <button class="petFoodBtn">
                    <div class="petFood">
                        <img src="convertPageAsset/pet-food.png" alt="Pet Food">
                        <p>pet foods</p>
                        <span>50 points</span>
                    </div>
                </button>

                <button class="petSuppliesBtn">
                    <div class="petSupplies">
                        <img src="convertPageAsset/cone.png" alt="Pet Supplies">
                        <p>pet supplies</p>
                        <span>75 points</span>
                    </div>
                </button>
            </div>

            <div class="orLine">
                <hr>
                <p>or</p>
                <hr>
            </div>

            <div class="indivTitle">Select your lucky furfriend</div>

            <div class="indivOptions">
                <button class="catBtn">
                    <div class="catOption">
                        <img src="convertPageAsset/dreaming.png" alt="Cat">
                    </div>
                </button>

                <button class="dogBtn">
                    <div class="dogOption">
                        <img src="convertPageAsset/rinking.png" alt="Dog">
                    </div>
                </button>
            </div>
        </div>

        <div class="catOverlay" id="catOverlay">
            <button class="closeCatOverlay closeBtn"><i class="fi fi-ss-circle-xmark"></i></button>
            <div class="catOverlayContent">
                <div class="catTitle">
                    <img src="convertPageAsset/cat (2).png" alt="Cat">
                    <p>cats</p>
                </div>

                <div class="indivCatTitle">Select your lucky furfriend</div>

                <div class="catNameLists">
                    <select name="catNamesDatabase" id="catNamesDatabase">
                        <option value=""></option>
                        <!--Put the Names of Cats from the Database-->
                    </select>
                    <label for="catNamesDatabase">Cat Names</label>
                </div>

                <a href="index.html"><button class="okBtn">OK</button></a>

            </div>
        </div>

        <div class="dogOverlay" id="dogOverlay">
            <button class="closeDogOverlay closeBtn"><i class="fi fi-ss-circle-xmark"></i></button>
            <div class="dogOverlayContent">
                <div class="dogTitle">
                    <img src="convertPageAsset/kisses.png" alt="Dog">
                    <p>dog</p>
                </div>

                <div class="indivDogTitle">Select your lucky furfriend</div>

                <div class="dogNameLists">
                    <select name="dogNamesDatabase" id="dogNamesDatabase">
                        <option value=""></option>
                        <!--Put the Names of Dogs from the Database-->
                    </select>
                    <label for="dogNamesDatabase">Dog Names</label>
                </div>

                <a href="index.html"><button class="okBtn">OK</button></a>

            </div>
        </div>

        <div class="feedbackOverlay" id="feedbackOverlay">
            <button class="closefeedbackOverlay closeBtn"><i class="fi fi-ss-circle-xmark"></i></button>
            <div class="feedbackOverlayContent">

                <div class="feedbackTitle">Thank You for your Generous Treat🍀</div>

                <a href="index.html"><button class="okBtn">OK</button></a>

            </div>
        </div>
    </div>
</div>
    <script src="convertPage.js"></script>
</body>
</html>
