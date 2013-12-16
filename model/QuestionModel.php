<?php
    class QuestionModel {
        public $content;
        public $exam;
        public $type;
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
    }
?>