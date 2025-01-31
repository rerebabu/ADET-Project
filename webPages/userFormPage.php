<?php
session_start();
include('connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: signlogpage.php");
    exit();
}

// If fullName is missing, try to fetch it from the database again
if (!isset($_SESSION['fullName'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT fullName FROM tuserinfo WHERE userName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $_SESSION['fullName'] = $row['fullName']; // ✅ Restore full name to session
    }
    $stmt->close();
}

// Now fullName should be available
$fullName = $_SESSION['fullName'] ?? "Not Available";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="userFormPageAssets/Logo.png">
    <link rel="stylesheet" href="userFormPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <title>Animal Report Form</title>
</head>
<body>
    <div class="container">
        <div class="sideBar">
            <div class="logoClass">
                <img src="userFormPageAssets/Logo.png" alt="TalaPuso Logo">
            </div>

            <div class="profileContent">
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

              <!-- Main Content -->
        <div class="mainContent">
            <h1>Form</h1>
            <form action="formSubmit.php" method="POST" enctype="multipart/form-data">
                <!-- First row -->
                <div class="form-row">
                    <div class="form-group">
                        <select id="animalType" name="animalType" required>
                            <option value="">Type of Animal</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="severity" name="severity" required>
                            <option value="">Incident Severity</option>
                            <option value="mild">Mild</option>
                            <option value="moderate">Moderate</option>
                            <option value="severe">Severe</option>
                            <option value="critical">Critical</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($fullName); ?>" readonly>

                <div class="form-group">
                    <input type="text" id="studentId" name="studentId" placeholder="Student ID Number" required>
                </div>

                <!-- Second row -->
                <div class="form-row">
                    <div class="form-group">
                        <input type="number" id="age" name="age" placeholder="Age" required>
                    </div>
                    <div class="form-group">
                        <select id="status" name="status" required>
                            <option value="">Status</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty Member</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group date-group">
                    <input type="text" id="incidentDate" name="incidentDate" placeholder="Date & Time of Incident" readonly required>
                    <button type="button" onclick="showCalendar()">
                        <i class="fi fi-rr-calendar" style="color: #345B9C;"></i>
                    </button>
                    <div id="calendarContainer"></div> <!-- Container for dynamic calendar input -->
                </div>

                <div class="form-group">
                    <input type="text" id="animalName" name="animalName" placeholder="Name of Animal [View Gallery]" required>
                </div>

                <div class="form-group">
                    <textarea id="description" name="description" placeholder="Specific Description of Animal" rows="1" required></textarea>
                </div>

                <div class="form-group">
                <select id="incidentType" name="incidentType" placeholder="Type of Incident" required>
                    <option value="">Type Of Incident</option>
                            <option value="injury">Injury</option>
                            <option value="lost">Lost</option>
                            <option value="Animal Cruelty">Animal Cruelty</option>
                            <option value="scratch or bite">Scratch/Bite</option>
                </select>
                </div>

                <div class="form-group upload-container">
                <div class="form-actions">
                    <button type="button" class="upload-btn" onclick="triggerFileInput()">Upload Proof of Incident</button>
                         <input type="file" id="proof" name="proof" hidden onchange="updateProofText()">
                            </div>

                            <div class="submit-container">
                            <button type="submit" class="submit-btn">Submit</button>
                            </div>
            </form>
        </div>
    </div>

    <script>
        function triggerFileInput() {
            document.getElementById('proof').click();
        }
    
        function updateProofText() {
            const fileInput = document.getElementById('proof');
            const proofText = document.getElementById('proofText');
            if (fileInput.files.length > 0) {
                proofText.value = fileInput.files[0].name;
            }
        }
    
        function showCalendar() {
            const input = document.getElementById('incidentDate');
            const calendarContainer = document.getElementById('calendarContainer');
            const button = document.querySelector('.date-group button');
    
            // Remove the calendar icon when clicked
            button.style.display = 'none';
    
            // Check if there's already an input, if so, don't create another one
            if (!calendarContainer.querySelector('input')) {
                // Create new input field of type 'datetime-local'
                const calendarInput = document.createElement('input');
                calendarInput.type = 'datetime-local';
                calendarInput.id = 'calendarInput';
                calendarInput.style.height = input.offsetHeight + 'px'; // Match height of original input
                calendarContainer.appendChild(calendarInput);
    
                // Add event listener to update the text input when a date is selected
                calendarInput.addEventListener('change', function () {
                    const selectedDate = new Date(calendarInput.value); // Get the selected date and time
    
                    // Format the date (YYYY-MM-DD)
                    const formattedDate = selectedDate.toISOString().split('T')[0]; // YYYY-MM-DD
    
                    // Format the time (HH:mm)
                    const formattedTime = selectedDate.toTimeString().slice(0, 5); // HH:mm
    
                    // Update the original input with the formatted value
                    input.value = `${formattedDate}T${formattedTime}`;
    
                    // Clear the calendar input and show the calendar icon again
                    calendarContainer.innerHTML = '';
                    button.style.display = 'inline';
                });
    
                // Focus on the calendar input
                calendarInput.focus();
            }
        }
    </script>
    
</body>
</html>
