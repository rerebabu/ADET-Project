<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/adminAssets/Logo.png">
    <link rel="stylesheet" href="../styles/adminDbSelect.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Database | Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="sideBar">
        <div class="logoClass">
          <img src="../assets/adminAssets/Logo.png" alt="TalaPuso Logo">
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
        <a href="../php/adminHomePage.php"><button>
                    <i class="fi fi-rr-home-heart"></i>
                    <span>Home</span>
                </button>
                </a>

                <a href="../php/adminDbSelect.php"><button>
                    <i class="fi fi-rr-database"></i>
                    <span>Database</span>
                </button>
                </a>

                <a href="../php/adminNotif.php"><button>
                    <i class="fi fi-rr-bell"></i>
                    <span>Notifications</span>
                </button>
                </a>
                
                <a href="../php/adminReportPage.php"><button>
                    <i class="fi fi-rr-newspaper"></i>
                    <span>Reports</span>
                </button>
                </a>

                <a href="../php/adminInbox.php"><button>
                    <i class="fi fi-rr-message-heart"></i>
                    <span>Inbox</span>
                </button>
                </a>
        </div>
      </div>

      <!-- Database Selection Content-->
      <div class="mainContent">
        <div class="databaseTitle">Database</div>

        <div class="cardsContainer">
          <!-- Community Cats Card -->
          <a href="../php/adminCatDB.php">

          <div class="card">
            <img src="../assets/adminAssets/playing.png" alt="Cat Icon">
            <h3>Meet the <span class="catText">Community Cats</span></h3> 
          </div>
          </a>
          <!-- Community Dogs Card -->
          <a href="../php/adminDogDB.php">
          <div class="card">
            <img src="../assets/adminAssets/dog-house.png" alt="Dog Icon" />
            <h3>Meet the <span class="dogText">Community Dogs</span></h3> 
          </div>
          </a>
    
        </div>
      </div>
    </div>
  </body>
</html>
