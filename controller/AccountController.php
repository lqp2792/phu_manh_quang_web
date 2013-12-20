<?php
    include_once('model/DatabaseModel.php');
    include_once('model/QuestionModel.php');
    include_once('model/TestModel.php');
    class AccountController {
        public $action;
        public $params;
        public $db;
        public $test;
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
                $page_title = "Account Panel";
                include('layout/header.php');
                include('layout/footer.html');
            }
        }

        public function add() {
            $page_title = "Add new Question";
            include('layout/header.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $question = new QuestionModel();
                $error = $this->check_question();
                if(empty($error)) {
                    $question->set_content($_POST['content']);
                    if(strcmp($_POST['exam'], "empty") != 0) $question->set_exam($_POST['exam']);
                    $question->set_type($_POST['type']);
                    if(strcmp($_POST['level'], "empty") != 0) $question->set_level($_POST['level']);
                    if(isset($_POST['comment'])) $question->set_comment($_POST['comment']);
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
                    $this->add_info($dbc, $_SESSION['username'], $question);
                    if($r) {
                        include('view/AddQuestionSuccessView.php');
                    }
                } else {
                    include('view/ErrorView.php');
                }
            }
            include('view/AddQuestionView.php');
            include('layout/footer.html');
        }
        public function add_info($dbc, $username, $question) {
            $qid = mysqli_insert_id($dbc);
            $query = "INSERT INTO questions_info VALUES ($qid, '".$username."', NOW())";
            $this->db->query($dbc, $query);
            $query = "INSERT INTO questions_level VALUES ($qid, '$question->level', '$question->comment')";
            $this->db->query($dbc, $query);
        }
        public function show() {
            $query = "SELECT * FROM questions";
            $result = $this->db->query($this->db->loadDatabase(), $query);
            $num_result = $result->num_rows;
            $page_limit = 10;
            $page = $_GET['page'];
            if(($num_result % 10)>0) {
                $num_page = ($num_result - $num_result%10)/10 + 1;
            } else {$num_page = $num_result/10;}
            $query = "SELECT * FROM questions LIMIT ".$page*$page_limit.",".$page_limit;
            $result = $this->db->query($this->db->loadDatabase(), $query);
            include('layout/header.php');
            include('view/ShowQuestionsView.php');
            include('layout/footer.html');
        }
        public function play() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                for($i=1; $i<$_GET['page']; $i++) {
                    $answer = "answer$i";
                    if(!isset($_POST[$answer])) {
                        $_POST[$answer] = "";
                    }
                    $this->test->user_result[] = $_POST[$answer];
                }
                $this->check_result();
            }
            $page_title = "Play";
            $dbc = $this->db->loadDatabase();
            $this->test = new TestModel($_GET['type'], $_GET['level'], $_GET['exam'], $_GET['page']);
            $test = $this->test->get_questions($this->db, $dbc);
            include('layout/header.php');
            include('view/PlayView.php');
            include('layout/footer.html');
        }
        public function check_result() {
            for($i=0; $i<$this->test->page_num; $i++) {
                echo 'Result :'.$this->test->user_result[$i]. ' vs '.$this->test->result[$i];
            }
        }
        public function create(){
            $page_title = "Create a Test";
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $error = $this->check_test();
                if(empty($error)) {
                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url .= '/Account/Play/'.$_POST['type'].'/'.$_POST['level'].'/'.$_POST['exam'].'/'.$_POST['page'];
                    header("Location: $url");
                    exit();
                }
            }
            include('layout/header.php');
            if(!empty($error)) include('view/ErrorView.php');
            include('view/CreateTestView.php');
            include('layout/footer.html');
        }
        public function check_test() {
            $error = array();
            if((strcmp($_POST['type'], 'empty')==0) && (strcmp($_POST['exam'], 'empty')==0)) {
                $error[] = 'You forgot to choose question type or exam';
            }
            if(strcmp($_POST['type'], 'empty')!=0) {

                if(strcmp($_POST['level'], "empty") == 0){
                    $error[] = 'You forgot to choose level';
                }
            }
            if(strcmp($_POST['page'], "0") == 0) {
                $error[] = 'You forgot to choose num page';
            }
            return $error;
        }
        public function check_question() {
            $error = array();
            if(empty($_POST['content'])) {
                $error[] = 'You forgot to enter question content';
            }
            if(strcmp($_POST['type'], "empty") == 0) {
                $error[] = 'You forgot to choose question type';
            } else {
                if(strcmp($_POST['level'], "empty") == 0) {
                    $error[] = 'You forgot to choose question level';
                }
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