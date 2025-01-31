<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start session
if (session_status() === PHP_SESSION_NONE) {
    die("Sessions are not enabled!");
}
include 'connect.php';

if(isset($_POST['signUp'])){
    $fullName = trim($_POST['fullName']);
    $userName = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($fullName) || empty($userName) || empty($password)){
        die("Please fill in all fields.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $checkUser = "SELECT * FROM tuserinfo WHERE username = ?";
    $stmt = $conn->prepare($checkUser);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        echo "Username already exists!";
    } else {
        $insertQuery = "INSERT INTO tuserinfo (fullname, username, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $fullName, $userName, $hashedPassword);
        
        if($stmt->execute()){
            header("Location: signlogpage.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $stmt->close();
}

// **Login Handling Section**
if(isset($_POST['login'])){
    $userName = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($userName) || empty($password)){
        die("Please enter both username and password.");
    }

    // Admin login check
    if($userName === "TalaAdmin" && $password === "PUPSintangPusa2025"){
        $_SESSION['username'] = $userName;
        header("Location: /ADETFinal/adminPages/adminHomePage.php"); // Redirect admin
        exit();
    }

    // Normal user login check
    $sql = "SELECT * FROM tuserinfo WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        if (password_verify($password, $row['password'])) {
            if (isset($row['userName'])) { // Use the correct column name
                $_SESSION['username'] = $row['userName'];  // Store username in session
                echo "Logged in as: " . $_SESSION['username']; // Debugging
                header("Location: userHomePage.php");
                exit();
            } else {
                echo "Error: Username not found in database.";
            }
        } else {
            echo "Incorrect Username or Password, please try again.";
        }
    } else {
        echo "Incorrect Username or Password, please try again.";
    }
    
    $stmt->close();
}

$conn->close();
?>
