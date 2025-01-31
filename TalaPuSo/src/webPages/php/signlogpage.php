<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="signlogAssets/Logo.png">
    <link rel="stylesheet" href="signlogpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>TalaPuso</title>
</head>
<body>

    <div class="navBar">
        <div class="logoClass">
            <img src="signlogAssets/Logo.png" alt="TalaPuso Logo">
        </div>
    </div>

    

    <div class="container" id="signupForm" style="display:none">
        <form action="register.php" method="POST" class="form">
            <div class="signupClass">
                Sign Up
            </div>
            <div class="studentInfo">
                <input type="text" id="fullName" name="fullName" placeholder="Fullname">
            </div>

            <div class="Username">
                <input type="text" id="username" name="username"placeholder="Username">
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="password" id="password">
            </div>
            
            <button type="submit" id="signup" name="signUp">sign up</button>
            <div class="links">
            <p>Already have an account?</p>
            <button type="button" id="logIn">Log in here</button>
            </div>
        </form>
        

        
    </div>
    
    <div class="container" id="logInForm">
        <form action="register.php" method="POST" class="form">
            
            <div class="signupClass">
                Log In
            </div>
            <div class="Username">
                <input type="text" id="uName" name="username" placeholder="Username">
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="password" id="Password">
            </div>
            
            <button type="submit" id="signup" name='login'>Log In</button>
            <div class="links">
            <p>Don't have an account?</p>
            <button type="button" id="registerBtn">Register Here</button>
            </div>
        </form>

        
    </div>
    
    <script src="signlogpage.js"></script>
</body>
</html>
