<div class="full_w">
    <div class="h_title"><?php
        if(isset($_GET['type'])) {
            echo $_GET['type'].' Test - ';
            switch($_GET['level']) {
                case 'pre_inter': echo "Pre Intermediate - "; break;
                case 'inter': echo "Intermediate - "; break;
                case 'adv_inter': echo "Adv Intermediate - "; break;
            }
        }
        if(isset($_GET['exam'])) echo $_GET['exam'].' - ';
        if(isset($_GET['page'])) echo $_GET['page'].' Questions';
        ?></div>
    <form action="" method="post">
    <?php
        $i=0;
        $result = array();
        $set = array();
        while($question = mysqli_fetch_array($question_set, MYSQLI_ASSOC)) {
            echo "<h2>Q".($i+1).": ".$question['content']."</h2>";
            $set[] = $question;
            $result[] = $question['answer'];
    ?>

        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="A" /><?php echo '  A. '.$question['choice_a'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="B" /><?php echo '  B. '.$question['choice_b'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="C" /><?php echo '  C. '.$question['choice_c'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="D" /><?php echo '  D. '.$question['choice_d'].'<br />'?>
        </div>
    <?php
            $i++;
        }
        $_SESSION['set'] = $set;
        $_SESSION['result'] = $result;
    ?>
        <div class="entry">
            <input type="submit" name="submit" value="Submit Answer" />
        </div>
    </form>
</div>
