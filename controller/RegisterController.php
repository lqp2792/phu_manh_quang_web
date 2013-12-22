<?php
    include_once('model/RegisterModel.php');
    include_once('model/DatabaseModel.php');
    class RegisterController {
        public $model;
        public $db;
        function __construct ( ) {
            $this->db = new DatabaseModel();
        }

        function invoke(){
            $page_title = 'Register Account';
            include('layout/header.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $error = $this->check_info();
                if(empty($error)) {
                    $dbc = $this->db->loadDatabase();
                    $r = $this->register($dbc, $this->model);
                    if($r) {
                        include('view/RegisterSuccessView.php');
                        include('layout/footer.html');
                        return;
                    } else {
                        $error[] = 'You could not register due to a system error. We apologize for any inconvenience';
                        include('view/ErrorView.php');
                        $error = array();
                    }
                } else {
                    include('view/ErrorView.php');
                }
            }
            include 'view/RegisterView.php';
            include('layout/footer.html');
        }

        function register($dbc, $model) {
            $q = "INSERT INTO users VALUES (null, '{$this->model->username}', SHA1('{$this->model->password}'),
             '{$this->model->first_name}', '{$this->model->last_name}','{$this->model->email}','{$this->model->phone_number}', NOW())";
            $r = $this->db->query($dbc, $q);
            return $r;
        }

        function check_info() {
            $error = array();
            if(empty($_POST['username'])) {
                $error[] = 'You forgot to enter your username';
            } else {
                $username = trim($_POST['username']);
            }
            if(empty($_POST['first_name'])) {
                $error[] = 'You forgot to enter your first name';
            } else {
                $first_name = trim($_POST['first_name']);
            }if(empty($_POST['last_name'])) {
                $error[] = 'You forgot to enter your last name';
            } else {
                $last_name = trim($_POST['last_name']);
            }
            if(empty($_POST['email'])) {
                $error[] = 'You forgot to enter your email';
            } else {
                $email = trim($_POST['email']).$_POST['postfix'];
            }
            if(!empty($_POST['phone_number'])) {
                $phone_number = trim($_POST['phone_number']);
            } else {
                $phone_number = "";
            }
            if(empty($_POST['password'])) {
                $error[] = 'You forgot to enter your password';
            } else {
                if($_POST['confirm_password'] != $_POST['password']) {
                    $error[] = 'Your password did not match the confirmed password';
                } else {
                    $password = trim($_POST['password']);
                }
            }
            if(empty($error)) $this->model = new RegisterModel($username, $password, $first_name, $last_name, $email, $phone_number);
            return $error;
        }
    }
?>