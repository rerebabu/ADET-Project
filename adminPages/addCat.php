<?php
include('../webPages/connect.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directory for file uploads
    $target_dir = "animalPhotos/";
    $animalPhoto = "";

    // Ensure file is uploaded without errors
    if (isset($_FILES["profilePic"]) && $_FILES["profilePic"]["error"] === UPLOAD_ERR_OK) {
        $file_name = basename($_FILES["profilePic"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($file_type, $allowed_types)) {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }

        // Ensure upload directory exists
        if (!is_dir($target_dir) && !mkdir($target_dir, 0777, true)) {
            die("Failed to create upload directory.");
        }

        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
            $animalPhoto = $target_file;
        } else {
            die("Error uploading file.");
        }
    } else {
        die("File upload error: " . $_FILES["profilePic"]["error"]);
    }

    // Retrieve and sanitize input values
    $addAnimalName = htmlspecialchars($_POST["animalName"] ?? "", ENT_QUOTES, 'UTF-8');
    $animalBreed = htmlspecialchars($_POST["animalBreed"] ?? "", ENT_QUOTES, 'UTF-8');
    $animalAge = htmlspecialchars($_POST["animalAge"] ?? "", ENT_QUOTES, 'UTF-8');
    $birthday = htmlspecialchars($_POST["animalBday"] ?? "", ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST["animalGender"] ?? "", ENT_QUOTES, 'UTF-8');
    $vaccinationRec = htmlspecialchars($_POST["vaccrec"] ?? "", ENT_QUOTES, 'UTF-8');
    $neuStatus = htmlspecialchars($_POST["spaystat"] ?? "", ENT_QUOTES, 'UTF-8');

    // Prepare and execute SQL query
    $sql = "INSERT INTO `tanimaldb` (`animalPhoto`, `addAnimalName`, `animalBreed`, `animalAge`, `birthday`, `gender`, `vaccinationRec`, `neuStatus`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssss", $animalPhoto, $addAnimalName, $animalBreed, $animalAge, $birthday, $gender, $vaccinationRec, $neuStatus);
        if ($stmt->execute()) {
            echo "<script>alert('Animal added successfully!'); window.location='adminHomePage.php';</script>";
        } else {
            die("Database error: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Database error: " . $conn->error);
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="adminAssets/Logo.png">
    <link rel="stylesheet" href="addCat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <title>Upload | Admin</title>
</head>
<body>

    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="adminAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            
                <div class="profileContent">
                    <div class="imgClass"></div>
                    <div class="welcome">Welcome, TalaAdmin</div>
                    <a href="logout.php">Log Out</a>
                </div>
            

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

            

            <form action="addCat.php" method="POST" enctype="multipart/form-data">
            <div class="container">
        <div class="mainContent">
        <form action="addCat.php" method="POST" enctype="multipart/form-data">
                <div class="btnsClass">
                    <button type="submit" class="saveBtn" name="submit">Save</button>
                    <button type="button" class="cancelBtn" onclick="cancelForm()">Cancel</button>
                </div>
            <div class="upperRow">
            <label for="profilePic" class="uploadContainer">
                    Upload Photo
            </label>
            <input type="file" name="profilePic" id="profilePic" accept="image/*" required>

                <div class="nameClass">
                    <label for="name">name</label>
                    <input type="text" name="animalName" id="animalName" required>
                </div>
            </div>

            <div class="middleRow">
                <div class="basicInfoTitle">
                    <span>Basic Information</span>
                    <button class="editInput"><i class="fi fi-br-edit"></i></button>
                </div>

                <hr>

                <div class="breedRow">
                    <p>Breed</p>
                    <input type="text" name="animalBreed" id="animalBreed" required>
                </div>

                <div class="ageRow">
                    <p>Age</p>
                    <input type="number" name="animalAge" id="animalAge" min="0">
                </div>

                <div class="bdayRow">
                    <p>Birthday</p>
                    <input type="date" name="animalBday" id="animalBday">
                </div>

                <div class="genderRow">
                    <p>Gender</p>
                    <select name="animalGender" id="animalGender" required>
                        <option value=""> </option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>

            <div class="bottomRow">
                <div class="medHistoTitle">
                    <span>Medical History</span>
                </div>

                <hr>

                <div class="spayRow">
                    <p>Spay/Neuter Status</p>
                    <div class="buttonsSelect">
                        <select name="spaystat" id="spaystat">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="displaySpay"></div>

                <div class="vaccinationRow">
                    <p>Vaccinated? (Yes/No)</p>
                    <div class="buttonsSelect">
                    <select name="vaccrec" id="vaccrec">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="displayVaccination"></div>

                <div class="reportHistoRow">
                    <p>Report History</p>
                </div>
</form>
                <div class="displayReport"></div>

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
    
    <script src="addCat.js"></script>

</body>
</html>