<?php
    class UserModel {
        public $uid;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $email;
        public $phone_number;
        public function __construct($username) {
            $this->username = $username;
        }
        public function getInformation($db, $username) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM users WHERE username='".$username."'";
            $r = $db->query($dbc, $query);
            while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) {
                $this->uid = $row['uid'];
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
    }
?>