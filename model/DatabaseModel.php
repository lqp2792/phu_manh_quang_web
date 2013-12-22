<?php
    class DatabaseModel {
        public $DB_USER;
        public $DB_PASSWORD;
        public $DB_HOST;
        public $DB_NAME;
        function __construct() {
            $info = array();
            $f = fopen('config/config.txt', "r");
            if($f) {
                while(($buffer = fgets($f)) != false) {
                    $buffer = explode(",", $buffer);
                    $info[$buffer[0]] = $buffer[1];
                }
                fclose($f);
            }
            $this->DB_USER = trim($info['DB_USER']);
            $this->DB_PASSWORD = trim($info['DB_PASSWORD']);
            $this->DB_HOST = trim($info['DB_HOST']);
            $this->DB_NAME = trim($info['DB_NAME']);
        }

        function loadDatabase(){
            $dbc = mysqli_connect($this->DB_HOST, $this->DB_USER,  $this->DB_PASSWORD, $this->DB_NAME);
            if(!$dbc) {
                echo 'Failed to connect to MySQL:'.mysqli_connect_error();
            } else {
                mysqli_set_charset($dbc, 'utf8');
                return $dbc;
            }
        }

        function query($dbc, $query) {
            $r = mysqli_query($dbc, $query);
            return $r;
        }
        function close($dbc) {
            mysqli_close($dbc);
        }
    }
?>