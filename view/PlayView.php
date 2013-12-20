<div class="full_w">
    <div class="h_title">Vocabulary Test Page 1</div>
    <form action="" method="post">
    <?php
        $i =1;
        while($question = mysqli_fetch_array($question_set, MYSQLI_ASSOC)) {
            echo "<h2>Q$i: ".$question['content']."</h2>";
    ?>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="a" /><?php echo '  '.$question['choice_a'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="b" /><?php echo '  '.$question['choice_b'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="c" /><?php echo '  '.$question['choice_c'].'<br />'?>
        </div>
        <div class="element">
            <input type="radio" name="<?php echo "answer$i" ?>" value="d" /><?php echo '  '.$question['choice_d'].'<br />'?>
        </div>
    <?php
            $i++;
        }
    ?>
        <div class="entry">
            <input type="submit" name="submit" value="submit" />
        </div>
    </form>
</div>
