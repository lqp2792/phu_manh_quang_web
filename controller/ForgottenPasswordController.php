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


}
?>