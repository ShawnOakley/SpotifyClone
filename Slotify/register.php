<!DOCTYPE html>

<?php 

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
?>

<html>
<head>
    <title>Registration Page</title>
</head>
<body>
<div id="inputContainer">
    <form id="loginForm" action="login.php" method="POST">
        <h2>Login to your account</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="" required>
        </p>

        <button type="submit" name="loginButton">Login</button>
    </form>
    <form id="registerForm" action="register.php" method="POST">
        <h2>Register your account</h2>
        <p>
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <label for="email">Email</label>
            <input id="email" name="email" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <label for="email2">Confirm email</label>
            <input id="email2" name="email2" type="text" placeholder="e.g. bartSimpson" required>        
        </p>                                
        <p>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="registerPassword" type="password" placeholder="Your password" required>
        </p>
        <p>
            <label for="registerPassword2">Confirm Password</label>
            <input id="registerPassword2" name="registerPassword2" type="password" placeholder="" required>
        </p>        

        <button type="submit" name="registerButton">Register</button>
    </form>    

</div>    
</body>
</html>