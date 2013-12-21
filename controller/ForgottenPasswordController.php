<?php
include_once('model/DatabaseModel.php');
class ForgottenPasswordController {
    public $username;
    public $email;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $db;
    public function __construct() {
        $this->db = new DatabaseModel();
    }

    public function invoke(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dbc = $this->db->loadDatabase();
            list($check, $data) = $this->check_info($dbc, $_POST['username'], $_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['phone_number']);
            if($check) {
                session_start();
                $_SESSION['username'] = $data['username'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['phone_number'] = $data['phone_number'];
                $this->send_email();
            }
            else {
                $error = $data;
            }
            mysqli_close($dbc);
        }
        $page_title = "Forgotten Password?";
        include('layout/header.php');
        if(isset($error) && !empty($error)) {
            include('view/ErrorView.php');
        }
        include('view/ForgottenPasswordView.php');
        include('layout/footer.html');
    }

    public function send_email(){
        $to = $this->email;
        $subject = "Forgotten Password";
        $message = "This is your password. Pleasa keep it more secure.";
        $headers = 'From: englishtest.url.ph' . "\r\n" .
            'Reply-To: englishtest.url.ph' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        include('layout/header.php');
        include('view/ForgottenPasswordSuccessView.php');
        include('layout/footer.html');
        exit();
    }

    public function check_info($dbc, $username, $first_name, $last_name, $email, $phone_number) {
        $error = array();
        if(empty($username)) {
            $error[] = 'You forgot to enter your username';
        } else {
            $this->username = trim($username);
        }
        if(empty($first_name)) {
            $error[] = 'You forgot to enter your first name';
        } else {
            $this->first_name = trim($first_name);
        }
        if(empty($last_name)) {
            $error[] = 'You forgot to enter your last name';
        } else {
            $this->last_name = trim($last_name);
        }
        if(empty($email)) {
            $error[] = 'You forgot to enter your email';
        } else {
            $this->email = trim($email);
        }
        if(empty($phone_number)) {
            $error[] = 'You forgot to enter your phone number';
        } else {
            $this->phone_number = trim($phone_number);
        }
        if(empty($error)) {
            $q = "SELECT * FROM users WHERE username='$this->username' AND phone_number = '$this->phone_number'  AND email = '$this->email' AND first_name = '$this->first_name' AND last_name = '$this->last_name'";
            $r = $this->db->query($dbc, $q);
            if(mysqli_num_rows($r) == 1) {
                $row = mysqli_fetch_array($r, MYSQL_ASSOC);
                return array(true, $row);
            } else {
                $error[] = 'Your infomation does not match.';
            }
        }
        return array(false, $error);
    }
}
?>