<?php
    session_start();
    include('connect.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/animalGalleryAssets/Logo.png">
    <link rel="stylesheet" href="../styles/animalGallery.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <title>Gallery</title>
</head>
<body>
    <div class="container">
        <div class="sideBar" id="sideBar">
            <div class="logoClass">
                <img src="../assets/animalGalleryAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <div class="profileContent">
                <div class="imgClass"></div>
                <div class="welcome">Welcome, <?php if(isset($_SESSION['username'])){
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
        <div class="mainContent" id="mainContent">
            <h1>Gallery</h1>
            <div class="tabs">
                <button class="tab active" onclick="showCategory('cats')">cats</button>
                <button class="tab" onclick="showCategory('dogs')">dogs</button>
            </div>
            <div class="gallery" id="gallery">
                <!-- Cats Content -->
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="cats">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>

                <!-- Dogs Content -->
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
                <div class="gallery-item" data-category="dogs" style="display: none;">
                    <div class="image"></div>
                    <div class="name">name</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showCategory(category) {
            // Update active tab
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));

            const activeTab = document.querySelector(`.tab[onclick="showCategory('${category}')"]`);
            activeTab.classList.add('active');

            // Show/hide gallery items
            const galleryItems = document.querySelectorAll('.gallery-item');
            galleryItems.forEach(item => {
                if (item.getAttribute('data-category') === category) {
                    item.style.display = 'flex'; // Show items of the selected category
                } else {
                    item.style.display = 'none'; // Hide items of other categories
                }
            });

            // Adjust sidebar height to match main content
            adjustSidebarHeight();
        }

        function adjustSidebarHeight() {
            const sideBar = document.getElementById('sideBar');
            const mainContent = document.getElementById('mainContent');
            const mainContentHeight = mainContent.scrollHeight; // Full height of the content
            sideBar.style.height = `${mainContentHeight}px`;
        }

        // Ensure the sidebar height adjusts on page load and resize
        window.addEventListener('load', adjustSidebarHeight);
        window.addEventListener('resize', adjustSidebarHeight);
    </script>
</body>
</html>
