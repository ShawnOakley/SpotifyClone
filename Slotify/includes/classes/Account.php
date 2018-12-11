<?php
    class Account {

        private $con;
        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();

        }

        public function register($username, $firstName, $lastName, $email, $email2, $password, $password2) {
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmails($email, $email2);
            $this->validatePasswords($password, $password2);

            if(empty($this->errorArray)) {
                return insertUserDetails($username, $firstName, $lastName, $email, $password);
            } else {
                return false;
            }
        }

        public function login($un, $pw) {
            $pw = md5($pw);
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
            
            if (mysqli_num_rows($query) == 1) {
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>"
        }

        private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/head_emerald.png";
            $date = date("Y-m-d");

            result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPw')")
        }
  
        private function validateUsername($userName) {
            if(strlen($userName) > 25 || strlen($userName) < 5) {
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
                return;
            }

            $checkUsernameQuery = mysqli_query($this->$con, "SELECT username FROM users WHERE username='$un'");
            if(mysqli_num_rows($checkUsernameQuery) != 0) {
                array_push($this->errorArray, Constants::$userNameTaken);
                return;
            }
        }

        private function validateFirstName($firstName) {
            if(strlen($firstName) > 25 || strlen($firstName) < 2) {
                array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
                return;
            }
        }

        private function validateLastName($lastName) {
            if(strlen($lastName) > 25 || strlen($lastName) < 2) {
                array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
                return;
            }
        }

        private function validateEmails($email, $email2) {
            if ($email != $email2) {
                array_push($this->errorArray, "Your emails don't match");
                return;                
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, "Email is invalid");
                return; 
            }

            $checkEmailQuery = mysqli_query($this->$con, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }            
        }

        private function validatePasswords($password, $password2) {
            if ($password != $password2) {
                array_push($this->errorArray, "Your passwords don't match");
                return;                
            }

            if(preg_match('/[^A-Za-z0-9]/', $password)) {
                array_push($this->errorArray, "Your passwords can only contain numbers and letters");
                return;  
            }

            if(strlen($password) > 30 || strlen($password) < 2) {
                array_push($this->errorArray, "Your password must be between 5 and 30 characters");
                return;
            }            
        }
    }

?>