<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="adminAssets/Logo.png">
    <link rel="stylesheet" href="adminCatDB.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <title>Cat Database | Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="sideBar">
        <div class="logoClass">
          <img src="adminAssets/Logo.png" alt="TalaPuso Logo" />
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

      <!-- Database Content-->
      <div class="content">
        <h2 class="title">Cat Database</h2>

        <div class="catList">

          <a href="#CatDetails">
          <div class="catItem">
            <div class="catIcon"></div>

            <div class="catDetails">
              <h3 class="catName">Pogi</h3>
              <p class="catInfo">Description here...</p>
            </div>
          </div></a>

          <a href="#CatDetails">
          <div class="catItem">
            <div class="catIcon"></div>

            <div class="catDetails">
              <h3 class="catName">Buchog</h3>
              <p class="catInfo">Description here...</p>
            </div>
          </div></a>
        </div>

        <a href="addCat.php">
        <button class="addButton"><i class="fi fi-br-plus"></i>Add a Cat</button>
        </a>

      </div>
    </div>
  </body>
</html>
