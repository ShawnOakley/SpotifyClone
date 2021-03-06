<?php 

function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText); 
    return $inputText;   
}

function sanitizeString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText); 
    $inputText = ucfirst(strtolower($inputText)); 
    return $inputText;   
}

function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;   
}

if (isset($_POST['registerButton'])) {
    echo "Register button was pressed";
    $username = sanitizeFormUsername($_POST['registerUsername']);

    $firstName = sanitizeString($_POST['firstName']);

    $lastName = sanitizeString($_POST['lastName']);

    $email = sanitizeString($_POST['email']);

    $email2 = sanitizeString($_POST['email2']);

    $registerPassword = sanitizeFormPassword($_POST['registerPassword']);

    $registerPassword2 = sanitizeFormPassword($_POST['registerPassword2']);    

    $account = new Account($username, $firstName, $lastName, $email, $email2, $registerPassword, $registerPassword2);

    $wasSuccessful = $account->($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if($wasSuccessful == true) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}

?>