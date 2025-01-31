<?php
session_start();
include('connect.php'); // Ensure this file properly connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animalType = $_POST['animalType'];
    $accidentSeverity = $_POST['severity'];
    $studentNumber = $_POST['studentId'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $dateTime = date('Y-m-d H:i:s', strtotime($_POST['incidentDate']));
    $animalName = $_POST['animalName'];
    $incidentType = $_POST['incidentType']; // Fix: No overwriting
    $studentName = $_POST['name'];
    $fullDesc = $_POST['description']; // Fix: Correctly storing the full description

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

        // ✅ Corrected Query: Add studentName & fullDesc
        $query = "INSERT INTO talaForm (animalType, accidentSeverity, studentNumber, age, status, dateTime, animalName, incidentType, proofImg, studentName, fullDesc) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssssssss", $animalType, $accidentSeverity, $studentNumber, $age, $status, $dateTime, $animalName, $incidentType, $proofImg, $studentName, $fullDesc);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Form submitted successfully!'); window.location.href='userHomePage.php';</script>";
        } else {
            echo "<script>alert('Database Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('File upload failed!'); window.history.back();</script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request'); window.location.href='userHomePage.php';</script>";
}
?>
