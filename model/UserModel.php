<?php
    class UserModel {
        public $uid;
        public $username;
        public $first_name;
        public $last_name;
        public $email;
        public $phone_number;

        public function getInformation($db, $username) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='".$username."'";
            $r = $db->query($dbc, $query);
            while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) {
                $this->uid = $row['uid'];
                $this->username = $row['username'];
                $this->first_name = $row['first_name'];
                $this->last_name = $row['last_name'];
                $this->email = $row['email'];
                $this->phone_number = $row['phone_number'];
            }
            $db->close($dbc);
        }
        public function setScore($db, $score) {
            $dbc = $db->loadDatabase();
            $query = "INSERT INTO test_history VALUES (null, $this->uid, $score, NOW())";
            $db->query($dbc, $query);
        }
        public function setHighScore($db, $score) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM high_scores WHERE uid=".$this->uid;
            $r = $db->query($dbc, $query);
            //Neu chua co ten trong danh sach diem
            if(mysqli_num_rows($r) == 0) {
                $query = "INSERT INTO high_scores VALUES ($this->uid, $score)";
            } else {
                $row = mysqli_fetch_array($r, MYSQL_ASSOC);
                $high_score = $row['high_score'];
                $high_score += $score;
                $query = "UPDATE high_scores SET high_score=$high_score WHERE uid=".$this->uid;
            }
            $db->query($dbc, $query);
        }
        /* Validate username - password Log in*/
        public function checkAccount($db, $username, $password) {
            $error = "";
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='".$username."'";
            $r = $db->query($dbc, $query);
            if(mysqli_num_rows($r) == 0) {
                $error = 'You entered wrong username';
                return array(false, $error);
            } else {
                $row = mysqli_fetch_array($r, MYSQL_ASSOC);
                if(strcmp(sha1($password), $row['password']) != 0) {
                    $error = 'You entered wrong password. Try again!';
                    return array(false, $error);
                }
            }
            return array(true, $error);
        }
        /* Register account into DB*/
        public function register($db, $username, $password, $first_name, $last_name, $email, $phone_number) {
            $error = "";
            if($this->isUsernameExisted($db, $username)) {
                $error = "Username already existed. Let's choose other username";
                return array(false, $error);
            } else {
                $dbc = $db->loadDatabase();
                $query = "INSERT INTO users VALUES (null, '".$username."', SHA1('$password'), '$first_name', '$last_name','$email','$phone_number', NOW())";
                $db->query($dbc, $query);
            }
            return array(true, $error);
        }
        /* Check if username already existed in database */
        public function isUsernameExisted($db, $username) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='".$username."'";
            $r = $db->query($dbc, $query);
            if(mysqli_num_rows($r) == 0) {
                return false;
            } else {
                return true;
            }
        }
        /* Check if this acount have admin role */
        public function isAdmin($db, $uid) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM admin WHERE uid=$uid";
            $r = $db->query($dbc, $query);
            $row = mysqli_fetch_array($r, MYSQL_ASSOC);
            return $row['admin'];
        }
        /* Change account password */
        public function changePassword($db, $username, $old_password, $new_password) {
            $error = "";
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='$username' AND password=SHA1('$old_password')";
            $r = $db->query($dbc, $query);
            if(mysqli_num_rows($r) == 0) {
                $error = "You entered wrong old password";
                return array(false, $error);
            } else {
                $query = "UPDATE users SET password=SHA1('$new_password') WHERE username='$username'";
                $db->query($dbc, $query);
                return array(true, $error);
            }
        }
        /* Validate email of an account */
        public function checkEmail($db, $username, $email) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='$username' AND email='$email'";
            $r = $db->query($dbc, $query);
            if(mysqli_num_rows($r) == 0) return false;
            else return true;
        }
    }
?>