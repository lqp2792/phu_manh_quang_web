<div class="full_w">
    <div class="h_title">Successful!</div>
    <p>Question: <?php echo $question->content?></p>
    <?php
        if(!empty($question->exam)) echo '<p>Exam: '.$question->exam.'</p>'
    ?>
    <p>Type: <?php echo $question->type?></p>
    <p>Choice A: <?php echo $question->choice_a?></p>
    <p>Choice B: <?php echo $question->choice_b?></p>
    <p>Choice C: <?php echo $question->choice_c?></p>
    <p>Choice D: <?php echo $question->choice_d?></p>
    <p>Answer: <?php echo $question->answer?></p>
</div>