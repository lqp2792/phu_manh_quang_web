<div class="full_w">
    <div class="h_title">Edit Question</div>
    <form action="Account/Edit/" method="post">
        <div class="element">
            <label for="content">Question Content <span class="red">(required)</span></label>
            <textarea name="content" class="textarea" rows="10" ><?php
                echo $question['content'];
                ?></textarea>
        </div>
        <div class="element">
            <label for="exam">Exam <span>(optional)</span></label>
            <select name="exam">
                <option value="empty">Exam Name</option>
                <option value="TOEIC" <?php if(strcmp($question['exam'],'TOEIC')==0) echo "selected"?>>TOEIC</option>
                <option value="TOEFL" <?php if(strcmp($question['exam'],'TOEFL')==0) echo "selected"?>>TOEFL</option>
                <option value="ESL" <?php if(strcmp($question['exam'],'ESL')==0) echo "selected"?>>ESL</option>
                <option value="GRE" <?php if(strcmp($question['exam'],'GRE')==0) echo "selected"?>>GRE</option>
                <option value="SAT" <?php if(strcmp($question['exam'],'SAT')==0) echo "selected"?>>SAT</option>
                <option value="GMAT" <?php if(strcmp($question['exam'],'GMAT')==0) echo "selected" ?>>GMAT</option>
            </select>
        </div>
        <div class="element">
            <label for="type">Type <span class="red">(required)</span></label>
            <select name="type" class="type">
                <option value="empty">Question Type</option>
                <option value="Grammar" <?php if(strcmp($question['type'],'Grammar')==0) echo "selected"?>>Grammar</option>
                <option value="Vocabulary" <?php if(strcmp($question['type'],'Vocabulary')==0) echo "selected"?>>Vocabulary</option>
                <option value="Reading" <?php if(strcmp($question['type'],'Reading')==0) echo "selected" ?>>Reading</option>
            </select>

            <select name="level" class="level">
                <option value="empty">Level</option>
                <option value="pre_inter" <?php if(strcmp($question['level'],'pre_inter')==0) echo "selected" ?>>Pre-Inter</option>
                <option value="inter" <?php if(strcmp($question['level'],'inter')==0) echo "selected"?>>Intermediate</option>
                <option value="adv_inter" <?php if(strcmp($question['level'],'adv_inter')==0) echo "selected" ?>>Advanced</option>
            </select>
        </div>
        <div class="element">
            <label for="comment">Comment:  <span>(What's this question about?)(optional)</span></label>
            <input class="text" type="text" name="comment" value="<?php echo $question['comment']; ?>"/>
        </div>
        <div class="element">
            <label for="choice_a">Choice A:</label>
            <input class="text" type="text" name="choice_a" value="<?php echo $question['choice_a']; ?>"/>
            <label for="choice_b">Choice B:</label>
            <input class="text" type="text" name="choice_b" value="<?php echo $question['choice_b']; ?>"/>
            <label for="choice_c">Choice C:</label>
            <input class="text" type="text" name="choice_c" value="<?php echo $question['choice_c']; ?>"/>
            <label for="choice_d">Choice D:</label>
            <input class="text" type="text" name="choice_d" value="<?php echo $question['choice_d']; ?>"/>
            <div class="sep"></div>
        </div>
        <div class="element">
            <label for="answer">Answer: <span class="red">(required)</span></label>
            <select name="answer" >
                <option value="empty">Answer</option>
                <option value="A" <?php if(strcmp($question['answer'],'A')==0) echo "selected"?>>A</option>
                <option value="B" <?php if(strcmp($question['answer'],'B')==0) echo "selected"?>>B</option>
                <option value="C" <?php if(strcmp($question['answer'],'C')==0) echo "selected"?>>C</option>
                <option value="D" <?php if(strcmp($question['answer'],'D')==0) echo "selected"?>>D</option>
            </select>
        </div>
        <button class="ok" type="submit" name="submit">Edit</button> <a class="button" href="<?php echo "Account/Search/{$_SESSION['type']}/{$_SESSION['level']}/{$_SESSION['exam']}/";?>">Cancel</a>
        <input type="hidden" name="qid" value="<?php echo $_GET['qid'] ?>">
    </form>
</div>