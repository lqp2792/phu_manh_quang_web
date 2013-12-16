<?php
    include_once('model/DatabaseModel.php');
    include_once('model/QuestionModel.php');
    class AccountController {
        public $action;
        public $db;

        public function __construct() {
            $this->db = new DatabaseModel();
        }
        public function set_action($action){
            $this->action = $action;
        }
        public function invoke() {
            session_start();
            $page_title = "Account Panel";
            include('layout/header.php');
            $function = strtolower($this->action.'_question');
            if(isset($this->action)) call_user_func(array($this, $function));
            include('layout/footer.html');
        }

        public function add_question() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $question = new QuestionModel();
                $error = $this->check_question();
                if(empty($error)) {
                    $question->set_content($_POST['content']);
                    if(strcmp($_POST['exam'], "empty") != 0) $question->set_exam($_POST['exam']);
                    $question->set_type($_POST['type']);
                    $question->set_choice_a($_POST['choice_a']);
                    $question->set_choice_b($_POST['choice_b']);
                    $question->set_choice_c($_POST['choice_c']);
                    $question->set_choice_d($_POST['choice_d']);
                    $question->set_answer(trim($_POST['answer']));
                    $dbc = $this->db->loadDatabase();
                    $query = "INSERT INTO questions VALUES (null, '$question->content', '$question->exam',
                    '$question->type', '$question->choice_a', '$question->choice_b', '$question->choice_c',
                    '$question->choice_d' ,'$question->answer')";
                    $r = $this->db->query($dbc, $query);
                    if($r) {
                        include('view/AddQuestionSuccessView.php');
                    }
                } else {
                    include('view/ErrorView.php');
                }
            }
            include('view/AddQuestionView.php');
        }
        public function check_question() {
            $error = array();
            if(empty($_POST['content'])) {
                $error[] = 'You forgot to enter question content';
            }
            if(strcmp($_POST['type'], "empty") == 0) {
                $error[] = 'You forgot to choose question type';
            }
            if(empty($_POST['choice_a'])) {
                $error[] = 'You forgot to enter Choice A';
            }
            if(empty($_POST['choice_b'])) {
                $error[] = 'You forgot to enter Choice B';
            }
            if(empty($_POST['choice_c'])) {
                $error[] = 'You forgot to enter Choice C';
            }
            if(empty($_POST['choice_d'])) {
                $error[] = 'You forgot to enter Choice D';
            }
            if(strcmp($_POST['answer'], "empty") == 0) {
                $error[] = 'You forgot to enter question answer';
            }
            return $error;
        }
    }
?>