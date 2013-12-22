<?php
    class TestModel {
        public $type;
        public $level;
        public $exam;
        public $page_num;
        public $result;
        public $user_result;
        public function __construct($type, $level, $exam, $page_num) {
            $this->type = $type;
            $this->level = $level;
            $this->exam = $exam;
            $this->page_num = $page_num;
            $result = array();
            $user_result = array();
        }

        public function get_questions($db, $dbc) {
            if((strcmp($this->type, "empty")!=0) && (strcmp($this->exam, "empty")!=0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid
                AND questions.type='$this->type' AND questions_level.level='$this->level'
                AND questions.exam='$this->exam' ORDER BY RAND() LIMIT $this->page_num";
            }
            if((strcmp($this->type, "empty")==0) && (strcmp($this->exam, "empty")!=0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid
                AND questions.exam='$this->exam' ORDER BY RAND() LIMIT $this->page_num";
            }
            if((strcmp($this->type, "empty")!=0) && (strcmp($this->exam, "empty")==0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid AND questions.type='$this->type'
                 AND questions_level.level='$this->level' ORDER BY RAND() LIMIT $this->page_num";
            }
            return $db->query($dbc, $query);
        }
    }
?>