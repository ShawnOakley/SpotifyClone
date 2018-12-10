<?php
    class Account {
        public function __construct() {
            $this->errorArray = array();

        }

        public function register($username, $firstName, $lastName, $email, $email2, $password, $password2) {
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmails($email, $email2);
            $this->validatePasswords($password, $password2);

            if(empty($this->errorArray)) {
                return true;
            } else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>"
        }
  
        private function validateUsername($userName) {
            if(strlen($userName) > 25 || strlen($userName) < 5) {
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
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