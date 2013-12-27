<?php
    include_once('model/DatabaseModel.php');
    include_once('model/QuestionModel.php');
    include_once('model/TestModel.php');
    include_once('model/UserModel.php');
    class AccountController {
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
                $page_title = "Account Panel";
                include('layout/header.php');
                include('view/AccountView.php');
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
            $page_title = "Show All Questions";
            $query = "SELECT * FROM questions";

            $result = $this->db->query($this->db->loadDatabase(), $query);
            $num_result = $result->num_rows;
            $page_limit = 10;
            if(isset($_GET['page'])) $page = $_GET['page'];
            else $page = 1;
            if(($num_result % 10)>0) {
                $num_page = ($num_result - $num_result%10)/10 + 1;
            } else {$num_page = $num_result/10;}
            $query = "SELECT * FROM questions LIMIT ".($page-1)*$page_limit.",".$page_limit;
            $result = $this->db->query($this->db->loadDatabase(), $query);
            include('layout/header.php');
            include('view/ShowQuestionsView.php');
            include('layout/footer.html');
        }
        public function questionhistory() {
            $page_title = "Question History";
            $query = "SELECT * FROM questions_info";
            $result = $this->db->query($this->db->loadDatabase(), $query);
            $num_result = $result->num_rows;
            $page_limit = 10;
            if(!$_GET['page']) {$page=1;}
            else $page = $_GET['page'];
            if(($num_result % 10)>0) {
                $num_page = ($num_result - $num_result%10)/10 + 1;
            } else {$num_page = $num_result/10;}
            $query = "SELECT * FROM questions_info LIMIT ".($page-1)*$page_limit.",".$page_limit;
            $result = $this->db->query($this->db->loadDatabase(), $query);
            include('layout/header.php');
            include('view/QuestionHistoryView.php');
            include('layout/footer.html');
        }
        public function play() {
            $page_title = "Play";
            include('layout/header.php');
            $test = new TestModel($_GET['type'], $_GET['level'], $_GET['exam'], $_GET['page']);
            $user_answer = array();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {                                  // Sau khi click Submit Answer
                for($i=0; $i<$test->page; $i++) {
                    $answer = "answer$i";                                               // Cau tra loi cua nguoi choi luu o $_POST['answer0'], ...$_POST['answer5'] .... $_POST['answer20']
                    if(!isset($_POST[$answer])) {
                        $_POST[$answer] = "";
                    }
                    $user_answer[] = $_POST[$answer];
                }
                $result = $test->check_result($user_answer, $_SESSION['result']);                            // So sanh cau tra loi cua nguoi choi va dap an
                $score_per_question = $test->score_per_question($_GET['level']);        // Xac dinh diem cho moi cau hoi tuy thuoc vao level
                $score = $test->cal_score($result, $score_per_question);                // Tinh toan diem cua moi cau hoi, sau khi so sanh
                $user = new UserModel();
                $user->getInformation($this->db, $_SESSION['username']);
                $user->setScore($this->db, $score);                                     // Luu diem vao DB
                $user->setHighScore($this->db, $score);
                include('view/ResultView.php');
                include('layout/footer.html');
                return;
            }
            $question_set = $test->get_questions($this->db);
            include('view/PlayView.php');
            include('layout/footer.html');
        }
        public function highscores() {
            $page_title = "High Scores";
            include('layout/header.php');
            $query = "SELECT username, first_name, last_name, high_score FROM users, high_scores
            WHERE high_scores.uid=users.uid ORDER BY high_score DESC LIMIT 10";
            $dbc = $this->db->loadDatabase();
            $r = $this->db->query($dbc, $query);
            include('view/HighScoresView.php');
            include('layout/footer.html');
        }
        public function history() {
            $page_title = "Test History";
            include('layout/header.php');
            $user = new UserModel($_SESSION['username']);
            $user->getInformation($this->db, $_SESSION['username']);
            $query = "SELECT tid, date, score FROM test_history WHERE uid=$user->uid";
            $dbc = $this->db->loadDatabase();
            $r = $this->db->query($dbc, $query);
            include('view/HistoryView.php');
            include('layout/footer.html');
        }
        /* BEGIN: CREATE A TEST */
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
        /* END: CREATE A TEST */

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
        /* BEGIN: SEARCH QUESTION */
        public function search() {
            $q = new QuestionModel();
            $page_title = "Search Questions";
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                $url .= '/Account/Search/'.$_POST['type'].'/'.$_POST['level'].'/'.$_POST['exam'];
                header("Location: $url");
                exit();
            }
            if(isset($_GET['type'])) {
                $set = $q->search_question($this->db, $_GET['type'], $_GET['level'], $_GET['exam']);
                $_SESSION['type'] = $_GET['type'];
                $_SESSION['level'] = $_GET['level'];
                $_SESSION['exam'] = $_GET['exam'];
            }

            include('layout/header.php');
            include('view/SearchQuestionView.php');
            include('layout/footer.html');
        }
        /* END: SEARCH QUESTION */

        /* BEGIN: EDIT QUESTION */
        public function edit() {
            $q = new QuestionModel();
            $question = $q->get_question($this->db, $_GET['qid']);
            $page_title = "Edit Questions";
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $error = $this->check_question();
                if(empty($error)) {
                    $q->edit($this->db, $_POST['qid'], $_POST['content'], isset($_POST['exam'])? $_POST['exam']: "",
                    $_POST['type'], isset($_POST['level'])? $_POST['level']: "", isset($_POST['comment'])? $_POST['comment']: "",
                    $_POST['choice_a'], $_POST['choice_b'], $_POST['choice_c'], $_POST['choice_d'], $_POST['answer']);

                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url .= '/Account/Search/'.$_SESSION['type'].'/'.$_SESSION['level'].'/'.$_SESSION['exam'];
                    header("Location: $url");
                    exit();
                }
            }
            include('layout/header.php');
            include('view/EditQuestionView.php');
            include('layout/footer.html');
        }
        /* END: EDIT QUESTION */

        /* BEGIN: DELETE QUESTION */
        public function delete() {
            $q = new QuestionModel();
            $page_title = "Delete Questions";
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                if($_POST['sure'] == 'Yes') {
                    $q->delete($this->db, $_POST['qid']);

                    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                    $url .= '/Account/Search/'.$_SESSION['type'].'/'.$_SESSION['level'].'/'.$_SESSION['exam'];
                    header("Location: $url");
                    exit();
                }
            }
            include('layout/header.php');
            include('view/DeleteQuestionView.php');
            include('layout/footer.html');
        }
        /* END: DELETE QUESTION */

        /* BEGIN: CHANGE PASSWORD */
        public function changepassword(){
            $dbc = $this->db->loadDatabase();
            $user = new UserModel();
            $page_title = "Change Password";
            include('layout/header.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $error = $this->check_info();
                if(empty($error)) {
                    list($check, $data) = $user->changePassword($this->db, $_SESSION['username'], $_POST['old_password'],
                        $_POST['new_password'], $_POST['confirm_password']);
                    if($check) {
                        $success[] = "Your password has been successfully changed.";
                        include('view/SuccessView.php');
                    } else {
                        $error[] = $data;
                        include('view/ErrorView.php');
                    }
                }
                else {
                    include('view/ErrorView.php');
                }
            }
            include('view/ChangePasswordView.php');
            include('layout/footer.html');
        }
        public function check_info( ) {
            $error = array();
            if(empty($_POST['old_password'])) {
                $error[] = 'You forgot to enter your old password';
            }
            if(empty($_POST['new_password'])) {
                $error[] = 'You forgot to enter your new password';
            }
            if(empty($_POST['confirm_password'])) {
                $error[] = 'You forgot to enter your confirm password';
            } else {
                if(strcmp($_POST['new_password'],$_POST['confirm_password']) != 0) {
                    $error[] = 'Your confirm password does not match the new password';
                }
            }
            return $error;
        }
        /* END: CHANGE PASSWORD */

    }
?>