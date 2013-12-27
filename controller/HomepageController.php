<?php
    include_once('model/DatabaseModel.php');
    include_once('model/QuestionModel.php');
    include_once('model/TestModel.php');
    include_once('model/UserModel.php');
    class HomepageController {
        public $action;
        public $params;
        public $db;
        public function __construct() {
            $this->db = new DatabaseModel();
        }
        public function set_action($action){
            $this->action = $action;
        }
        public function set_params($params) {
            $this->params = $params;
        }
        public function invoke() {
            session_start();
            $function = strtolower($this->action);
            if(isset($this->action)) {
                call_user_func(array($this, $function));
            } else {
                $page_title = 'Homepage';
                include('layout/header.php');
                include 'view/HomepageView.php';
                include('layout/footer.html');
            }
        }
        /* BEGIN: REGISTER NEW ACCOUNT */
        public function register(){
            $user = new UserModel();
            $page_title = 'Register Account';
            include('layout/header.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $error = $this->check_info();
                if(empty($error)) {
                    list($check, $data) = $user->register($this->db, trim($_POST['username']), trim($_POST['password']), trim($_POST['first_name']),
                        trim($_POST['last_name']), trim($_POST['email']).$_POST['postfix'], isset($_POST['phone_number'])? trim($_POST['phone_number']) : "");
                    if($check) {
                        include('view/RegisterSuccessView.php');
                        include('layout/footer.html');
                        return;
                    } else {
                        $error[] = $data;
                        include('view/ErrorView.php');
                    }
                } else {
                    include('view/ErrorView.php');
                }
            }
            include 'view/RegisterView.php';
            include('layout/footer.html');
        }
        public function check_info() {
            $error = array();
            if(empty($_POST['username'])) {
                $error[] = 'You forgot to enter your username';
            }
            if(empty($_POST['first_name'])) {
                $error[] = 'You forgot to enter your first name';
            }
            if(empty($_POST['last_name'])) {
                $error[] = 'You forgot to enter your last name';
            }
            if(empty($_POST['email'])) {
                $error[] = 'You forgot to enter your email';
            }
            if(!empty($_POST['phone_number'])) {
                $phone_number = trim($_POST['phone_number']);
            }
            if(empty($_POST['password'])) {
                $error[] = 'You forgot to enter your password';
            } else {
                if($_POST['confirm_password'] != $_POST['password']) {
                    $error[] = 'Your password did not match the confirmed password';
                }
            }
            return $error;
        }
        /* END: REGISTER NEW ACCOUNT */

        /* BEGIN: LOGIN ACCOUNT */
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                list($check, $data) = $this->check_login($this->db, $_POST['username'], $_POST['password']);
                if($check) {
                    $user = $data;
                    session_start();
                    $_SESSION['username'] = $user->username;
                    $_SESSION['admin'] = $user->isAdmin($this->db, $user->uid);
                    $this->redirect_user();
                } else {
                    $error = $data;
                }
            }
            $page_title = "Log in";
            include('layout/header.php');
            if(isset($error) && !empty($error)) include('view/ErrorView.php');
            include('view/LoginView.php');
            include('layout/footer.html');
        }
        public function redirect_user($page = '/Account/'){
            $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $url .= $page;
            header("Location: $url");
            exit();
        }
        public function check_login($db, $username, $password) {
            $user = new UserModel();
            $error = array();
            if(empty($username)) {
                $error[] = 'You forgot to enter your username';
            }
            if(empty($password)) {
                $error[] = 'You forgot to enter your password';
            }
            if(empty($error)) {
                $username = trim($username);
                $password = trim($password);
                list($check, $e) = $user->checkAccount($db, $username, $password);
                if($check) {
                    $user->getInformation($db, $username);
                    return array(true, $user);
                } else {
                    $error[] =  $e;
                }
            }
            return array(false, $error);
        }
        /* END: LOGIN ACCOUNT */

        /* BEGIN: LOGOUT ACCOUNT */
        public function logout() {
            $page_title = 'Log out';
            session_start();
            session_destroy();
            $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            header("Location: $url");
            exit();
        }
        /* END: LOGOUT ACCOUNT */

        /* BEGIN: GUIDE */
        public function guide() {
            $page_title = "Guide";
            include('layout/header.php');
            include('view/GuideView.php');
            include('layout/footer.html');
        }
        /* END: GUIDE */

        /* BEGIN: ABOUT */
        public function about() {
            $page_title = "About";
            include('layout/header.php');
            include('view/AboutView.php');
            include('layout/footer.html');
        }
        /* END: ABOUT */

        /* BEGIN: SUPPORT */
        public function support() {
            $page_title = "Support";
            include('layout/header.php');
            include('view/SupportView.php');
            include('layout/footer.html');
        }
        /* END: SUPPORT */

        /* BEGIN: FORGOT PASSWORD */
        public function forgot(){
            $page_title = "Forgotten Password?";
            include('layout/header.php');
            $dbc = $this->db->loadDatabase();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $error = $this->check_email();
                if(empty($error)) {
                    $this->send_email($_POST['email']);
                    $success = array();
                    $success[] = "Your password has been sent to your email.";
                    include('view/SuccessView.php');
                }
                else {
                    include('view/ErrorView.php');
                }
                mysqli_close($dbc);
            }

            include('view/ForgottenPasswordView.php');
            include('layout/footer.html');
        }

        public function send_email($email){
            $to = $email;
            $subject = "Forgotten Password";
            $message = "This is your password. Pleasa keep it more secure.";
            $headers = 'From: englishtest.url.ph' . "\r\n" .
                'Reply-To: englishtest.url.ph' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
        }

        public function check_email() {
            $error = array();
            $user = new UserModel();
            if(empty($_POST['username'])) {
                $error[] = 'You forgot to enter your username';
            }
            if(empty($_POST['email'])) {
                $error[] = 'You forgot to enter your email';
            }
            if(!($user->checkEmail($this->db, $_POST['username'], $_POST['email']))) {
                $error[] = 'You entered wrong email';
            }
            return $error;
        }
        /* END: FORGOT PASSWORD */
    }
?>
