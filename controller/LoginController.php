<?php
    include_once('model/DatabaseModel.php');
    class LoginController {
        public $username;
        public $password;
        public $db;
        public function __construct() {
            $this->db = new DatabaseModel();
        }

        public function invoke(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dbc = $this->db->loadDatabase();
                list($check, $data) = $this->check_login($dbc, $_POST['username'], $_POST['password']);
                if($check) {
                    session_start();
                    $_SESSION['username'] = $data['username'];
                    $this->redirect_user();
                } else {
                    $error = $data;
                }
                mysqli_close($dbc);
            }
            $page_title = "Log in";
            include('layout/header.php');
            if(isset($error) && !empty($error)) {
               include('view/ErrorView.php');
            }
            include('view/LoginView.php');
            include('layout/footer.html');
        }

        public function redirect_user($page = '/Account/'){
            $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $url .= $page;
            header("Location: $url");
            exit();
        }

        public function check_login($dbc, $username, $password) {
            $error = array();
            if(empty($username)) {
                $error[] = 'You forgot to enter your username';
            } else {
                $this->username = trim($username);
            }
            if(empty($password)) {
                $error[] = 'You forgot to enter your password';
            } else {
                $this->password = trim($password);
            }
            if(empty($error)) {
                $q = "SELECT * FROM users WHERE username='$this->username' AND password=SHA1('$this->password')";
                $r = $this->db->query($dbc, $q);
                if(mysqli_num_rows($r) == 1) {
                    $row = mysqli_fetch_array($r, MYSQL_ASSOC);
                    return array(true, $row);
                } else {
                    $error[] = 'Your username or password does not match.';
                }
            }
            return array(false, $error);
        }
    }
?>