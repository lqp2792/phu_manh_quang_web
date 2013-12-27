<div class="full_w">
    <script>
        function true_answer(id) {
            id = "#" + id;
            $(id).toggleClass('element n_ok');
        };
    </script>
    <script>
        function false_answer(id) {
            id = "#" + id;
            $(id).toggleClass('element n_error');
        }
    </script>
    <div class="h_title">Result</div>
    <div class="element"><h2><?php
            echo "Score: $score";
            $count=0;
            for($i=0; $i<$test->page;$i++) {
                if($result[$i]) $count++;
            }
            echo " Answer: $count / $test->page";
    ?></h2></div>
    <?php
        $set = $_SESSION['set'];
        $i=0;
        echo "<form>";
        foreach($set as $question) {
            echo "<h2>Q".($i+1).": ".$question['content']."</h2>";
            echo '<div id="A'.($i+1).'" class="element"><p>A. '.$question['choice_a'].'<br /></div>';
            echo '<div id="B'.($i+1).'" class="element"><p>B. '.$question['choice_b'].'<br /></div>';
            echo '<div id="C'.($i+1).'" class="element"><p>C. '.$question['choice_c'].'<br /></div>';
            echo '<div id="D'.($i+1).'" class="element"><p>D. '.$question['choice_d'].'<br /></div>';
            if($result[$i]) {
                switch($_SESSION['result'][$i]) {
                    case "A": echo '<script type="text/javascript"> true_answer("A'.($i+1).'");</script>'; break;
                    case "B": echo '<script type="text/javascript"> true_answer("B'.($i+1).'");</script>'; break;
                    case "C": echo '<script type="text/javascript"> true_answer("C'.($i+1).'");</script>'; break;
                    case "D": echo '<script type="text/javascript"> true_answer("D'.($i+1).'");</script>'; break;
                }
            } else {
                switch($user_answer[$i]) {
                    case "A": echo '<script type="text/javascript"> false_answer("A'.($i+1).'");</script>'; break;
                    case "B": echo '<script type="text/javascript"> false_answer("B'.($i+1).'");</script>'; break;
                    case "C": echo '<script type="text/javascript"> false_answer("C'.($i+1).'");</script>'; break;
                    case "D": echo '<script type="text/javascript"> false_answer("D'.($i+1).'");</script>'; break;
                }
                switch($_SESSION['result'][$i]) {
                    case "A": echo '<script type="text/javascript"> true_answer("A'.($i+1).'");</script>'; break;
                    case "B": echo '<script type="text/javascript"> true_answer("B'.($i+1).'");</script>'; break;
                    case "C": echo '<script type="text/javascript"> true_answer("C'.($i+1).'");</script>'; break;
                    case "D": echo '<script type="text/javascript"> true_answer("D'.($i+1).'");</script>'; break;
                }
            }
            $i++;
        }
    ?>
        <div class="element">
            <a class="button" href="Account/Create/">Take New Test</a><a class="button" href="Account/HighScores/">Hall of Fame</a>
        </div>
    </form>

</div>