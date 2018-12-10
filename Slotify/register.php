<!DOCTYPE html>

<?php
    include("includes/classes/Account.php");
    $account = new Account();

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
            <?php echo $account->getError("Your username must be between 5 and 25 characters"); ?> 
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError("Your first name must be between 2 and 25 characters"); ?> 
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError("Your last name must be between 2 and 25 characters"); ?> 
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError("Your emails don't match"); ?> 
            <?php echo $account->getError("Email is invalid"); ?> 
            <label for="email">Email</label>
            <input id="email" name="email" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError("Your emails don't match"); ?> 
            <?php echo $account->getError("Email is invalid"); ?> 

            <label for="email2">Confirm email</label>
            <input id="email2" name="email2" type="text" placeholder="e.g. bartSimpson" required>        
        </p>                                
        <p>
            <?php echo $account->getError("Your passwords don't match"); ?> 
            <?php echo $account->getError("Your passwords can only contain numbers and letters"); ?> 
            <?php echo $account->getError("Your password must be between 5 and 30 characters"); ?> 
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="registerPassword" type="password" placeholder="Your password" required>
        </p>
        <p>
            <?php echo $account->getError("Your passwords don't match"); ?> 
            <?php echo $account->getError("Your passwords can only contain numbers and letters"); ?> 
            <?php echo $account->getError("Your password must be between 5 and 30 characters"); ?> 
            <label for="registerPassword2">Confirm Password</label>
            <input id="registerPassword2" name="registerPassword2" type="password" placeholder="" required>
        </p>        

        <button type="submit" name="registerButton">Register</button>
    </form>    

</div>    
</body>
</html>