<!DOCTYPE html>

<?php
    include("includes/config.php");
    include("includes/classes/Constants.php");

    include("includes/classes/Account.php");
    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name) {
        if (isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

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
            <?php echo $account->getError(Constants::$loginFailed); ?> 
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
            <?php echo $account->getError(Constants::$userNameCharacters); ?> 
            <?php echo $account->getError(Constants::$userNameTaken); ?> 
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('registerUsername'); ?>" required>        
        </p>
        <p>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?> 
            <label for="firstName">First Name</label>
            <input value="<?php getInputValue('firstName'); ?>" id="firstName" name="firstName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError(Constants::$lastNameCharacters); ?> 
            <label for="lastName">Last Name</label>
            <input value="<?php getInputValue('lastName'); ?>" id="lastName" name="lastName" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?> 
            <?php echo $account->getError(Constants::$emailInvalid); ?> 
            <?php echo $account->getError(Constants::$emailTaken); ?> 
            <label for="email">Email</label>
            <input value="<?php getInputValue('email'); ?>" id="email" name="email" type="text" placeholder="e.g. bartSimpson" required>        
        </p>
        <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?> 
            <?php echo $account->getError(Constants::$emailInvalid); ?> 
            <label for="email2">Confirm email</label>
            <input value="<?php getInputValue('email2'); ?>" id="email2" name="email2" type="text" placeholder="e.g. bartSimpson" required>        
        </p>                                
        <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?> 
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?> 
            <?php echo $account->getError(Constants::$passwordCharacters); ?> 
            <label for="registerPassword">Password</label>
            <input value="<?php getInputValue('registerPassword'); ?>" id="registerPassword" name="registerPassword" type="password" placeholder="Your password" required>
        </p>
        <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?> 
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?> 
            <?php echo $account->getError(Constants::$passwordCharacters); ?> 
            <label for="registerPassword2">Confirm Password</label>
            <input value="<?php getInputValue('registerPassword2`'); ?>" id="registerPassword2" name="registerPassword2" type="password" placeholder="" required>
        </p>        

        <button type="submit" name="registerButton">Register</button>
    </form>    

</div>    
</body>
</html>