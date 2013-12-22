<?php
include_once('model/DatabaseModel.php');
class ChangePasswordController {
    public $username;
    public $email;
    public $old_password;
    public $new_password;
    public $confirm_password;
    public $db;
    public function __construct() {
        $this->db = new DatabaseModel();
    }

    public function invoke(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dbc = $this->db->loadDatabase();
            list($check, $data) = $this->check_info($dbc, $_POST['username'], $_POST['old_password'],$_POST['new_password'],$_POST['confirm_password'],$_POST['email']);
            if($check) {
                $this->change_password($dbc);
            }
            else {
                $error = $data;
            }
            mysqli_close($dbc);
        }
        $page_title = "Change Password";
        include('layout/header.php');
        if(isset($error) && !empty($error)) {
            include('view/ErrorView.php');
        }
        include('view/ChangePasswordView.php');
        include('layout/footer.html');
    }

    public function change_password($dbc){
        $query = "UPDATE users SET password = SHA1('$this->new_password') WHERE username = '$this->username'";
        $result = $this->db->query($dbc, $query);
        if($result) {
            $success[] = "Your password has been successfully changed.";

        }
        include('layout/header.php');
        if(isset($success) && !empty($success)) {
            include('view/SuccessView.php');
        }
        include('layout/footer.html');
        exit();
        //}
    }

    public function check_info($dbc, $username, $old_password, $new_password, $confirm_password, $email) {
        $error = array();
        if(empty($username)) {
            $error[] = 'You forgot to enter your username';
        } else {
            $this->username = trim($username);
        }
        if(empty($old_password)) {
            $error[] = 'You forgot to enter your old password';
        } else {
            $this->old_password = trim($old_password);
        }
        if(empty($new_password)) {
            $error[] = 'You forgot to enter your new password';
        } else {
            $this->new_password = trim($new_password);
        }
        if(empty($confirm_password)) {
            $error[] = 'You forgot to enter your confirm password';
        } else {
            if($new_password != $confirm_password) {
                $error[] = 'Your confirm password does not match the new password';
            } else {
            $this->confirm_password = trim($confirm_password);
            }
        }
        if(empty($email)) {
            $error[] = 'You forgot to enter your email';
        } else {
            $this->email = trim($email);
        }
        if(empty($error)) {
            $q = "SELECT * FROM users WHERE username='$this->username' AND password = SHA1('$this->old_password')";
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