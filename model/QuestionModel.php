<?php
    class QuestionModel {
        public $content;
        public $exam;
        public $type;
        public $level;
        public $comment;
        public $choice_a;
        public $choice_b;
        public $choice_c;
        public $choice_d;
        public $answer;

        public function set_content($content) {
            $this->content = $content;
        }
        public function set_exam($exam) {
            $this->exam = $exam;
        }
        public function set_type($type) {
            $this->type = $type;
        }
        public function set_level($level) {
            $this->level = $level;
        }
        public function set_comment($comment) {
            $this->comment = $comment;
        }
        public function set_choice_a($choice_a) {
            $this->choice_a = $choice_a;
        }
        public function set_choice_b($choice_b) {
            $this->choice_b = $choice_b;
        }
        public function set_choice_c($choice_c) {
            $this->choice_c = $choice_c;
        }
        public function set_choice_d($choice_d) {
            $this->choice_d = $choice_d;
        }
        public function set_answer($answer) {
            $this->answer = $answer;
        }
        public function search_question($db, $type, $level, $exam) {
            $dbc = $db->loadDatabase();
            $query = "SELECT * FROM questions, questions_level WHERE questions.qid=questions_level.qid ";
            if(strcmp($type, "empty") != 0) {
                $query .= "AND type='$type' ";
                if(strcmp($level, "empty") != 0) $query .= "AND questions_level.level='$level' ";
                if(strcmp($exam, "empty") != 0) $query .= "AND exam='$exam' ";
            } else if(strcmp($level, "empty") != 0) {
                $query .= "AND questions_level.level='$level' ";
                if(strcmp($exam, "empty") != 0) $query .= "AND exam='$exam' ";
            } else {
                $query .= "AND type='$type' ";
            }
            $set = $db->query($dbc, $query);
            return $set;
        }

        public function get_question($db, $qid) {
            $dbc = $db->loadDatabase();
            $query = "SELECT *  FROM questions, questions_level WHERE questions.qid=$qid AND questions.qid=questions_level.qid";
            $r = $db->query($dbc, $query);
            return mysqli_fetch_array($r, MYSQL_ASSOC);
        }
        public function edit($db, $qid, $content, $exam, $type, $level, $comment, $choice_a, $choice_b, $choice_c, $choice_d, $answer) {
            $dbc = $db->loadDatabase();
            $query = "UPDATE questions, questions_level SET content='$content', exam='$exam',
            type='$type', level='$level', comment='$comment', choice_a='$choice_a', choice_b='$choice_b',
             choice_c='$choice_c', choice_d='$choice_d', answer='$answer' WHERE questions.qid=$qid AND questions.qid = questions_level.qid";
            echo $query;
            $db->query($dbc, $query);
        }
        public function delete($db, $qid) {
            $dbc = $db->loadDatabase();
            $query = "DELETE FROM questions WHERE qid=$qid LIMIT 1";
            $db->query($dbc, $query);
        }
    }
?>