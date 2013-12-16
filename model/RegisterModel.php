<?php
    class RegisterModel {
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $email;
        public $phone_number;

        function __construct($username, $password, $first_name, $last_name, $email, $phone_number) {
            $this->username = $username;
            $this->password = $password;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->phone_number = $phone_number;
        }
    }
?>