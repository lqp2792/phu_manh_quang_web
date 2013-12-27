<?php
    class TestModel {
        public $type;
        public $level;
        public $exam;
        public $page;
        public function __construct($type, $level, $exam, $page) {
            $this->type = $type;
            $this->level = $level;
            $this->exam = $exam;
            $this->page = $page;
        }
        public function get_questions($db) {
            $dbc = $db->loadDatabase();
            if((strcmp($this->type, "empty")!=0) && (strcmp($this->exam, "empty")!=0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid
                AND questions.type='$this->type' AND questions_level.level='$this->level'
                AND questions.exam='$this->exam' ORDER BY RAND() LIMIT $this->page";
            }
            if((strcmp($this->type, "empty")==0) && (strcmp($this->exam, "empty")!=0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid
                AND questions.exam='$this->exam' ORDER BY RAND() LIMIT $this->page";
            }
            if((strcmp($this->type, "empty")!=0) && (strcmp($this->exam, "empty")==0)) {
                $query = "SELECT * FROM questions, questions_level WHERE questions.qid = questions_level.qid AND questions.type='$this->type'
                 AND questions_level.level='$this->level' ORDER BY RAND() LIMIT $this->page";
            }
            $r = $db->query($dbc, $query);
            $db->close($dbc);
            return $r;
        }

        public function score_per_question($level) {
            if(isset($level)) {
                switch($level) {
                    case "pre_inter":
                        $score_per_question=5;
                        break;
                    case "inter":
                        $score_per_question=10;
                        break;
                    case "adv_inter";
                        $score_per_question=15;
                        break;
                }
            } else {
                $score_per_question=5;
            }
            return $score_per_question;
        }

        public function cal_score($result, $score_per_question) {
            $score=0;
            for($i=0; $i<$this->page; $i++) {
                if($result[$i]) $score+=$score_per_question;
            }
            return $score;
        }

        public function check_result($user_answer, $true_answer) {
                $result = array();
                for($i=0; $i<$this->page; $i++) {
                    if(strcmp($true_answer[$i], $user_answer[$i])==0) {
                        $result[] = true;
                    } else $result[] = false;
                }
                return $result;
        }
    }
?>