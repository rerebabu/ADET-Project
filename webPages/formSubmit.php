<?php
session_start();
include('connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animalType = $_POST['animalType'];
    $accidentSeverity = $_POST['severity'];
    $studentNumber = $_POST['studentId'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $dateTime = date('Y-m-d H:i:s', strtotime($_POST['incidentDate']));
    $animalName = $_POST['animalName'];
    $incidentType = $_POST['incidentType'];
    $fullDesc = $_POST['description'];

    // Use session-stored full name
    $studentName = $_SESSION['fullName'];

    // File Upload Handling
    $proofImg = $_FILES['proof']['name'];
    $targetDir = "imgIncident/";
    $targetFile = $targetDir . basename($_FILES["proof"]["name"]);

    if (!isset($_FILES["proof"]) || $_FILES["proof"]["error"] != 0) {
        echo "<script>alert('Error uploading file!'); window.history.back();</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["proof"]["tmp_name"], $targetFile)) {
        $proofImg = $targetFile; // Save full path

        $query = "INSERT INTO talaForm (animalType, accidentSeverity, studentNumber, age, status, dateTime, animalName, incidentType, proofImg, studentName, fullDesc) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssss", $animalType, $accidentSeverity, $studentNumber, $age, $status, $dateTime, $animalName, $incidentType, $proofImg, $studentName, $fullDesc);

        if ($stmt->execute()) {
            echo "<script>alert('Form submitted successfully!'); window.location.href='userHomePage.php';</script>";
        } else {
            echo "<script>alert('Database Error: " . $conn->error . "'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('File upload failed!'); window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='userHomePage.php';</script>";
}
?>
