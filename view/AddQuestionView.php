<div class="full_w">
<!--    <script>-->
<!--        $(document).ready(function() {-->
<!--            $(".level").hide();-->
<!--            $(".type").change(function() {-->
<!--                var option = $(this).val();-->
<!--                if(option != "empty")  {-->
<!--                    $(".level").show();-->
<!--                } else {-->
<!--                    $(".level").hide();-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    </script>-->
    <div class="h_title">Add New Question</div>
    <form action="" method="post">
        <div class="element">
            <label for="content">Question Content <span class="red">(required)</span></label>
            <textarea name="content" class="textarea" rows="10" ><?php
                if(isset($_POST['content']) && !empty($error)) echo $_POST['content'];
            ?></textarea>
        </div>
        <div class="element">
            <label for="exam">Exam <span>(optional)</span></label>
            <select name="exam">
                <option value="empty">Exam Name</option>
                <option value="TOEIC" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'TOEIC')==0) echo "selected"
                ?>>TOEIC</option>
                <option value="TOEFL" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'TOEFL')==0) echo "selected"
                ?>>TOEFL</option>
                <option value="ESL" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'ESL')==0) echo "selected"
                ?>>ESL</option>
                <option value="GRE" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'GRE')==0) echo "selected"
                ?>>GRE</option>
                <option value="SAT" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'SAT')==0) echo "selected"
                ?>>SAT</option>
                <option value="GMAT" <?php
                    if(isset($_POST['exam']) && strcmp($_POST['exam'],'GMAT')==0) echo "selected"
                ?>>GMAT</option>
            </select>
        </div>

        <div class="element">
            <label for="type">Type <span class="red">(required)</span></label>
            <select name="type" class="type">
                <option value="empty">Question Type</option>
                <option value="Grammar" <?php
                    if(isset($_POST['type']) && strcmp($_POST['type'],'Grammar')==0) echo "selected"
                ?>>Grammar</option>
                <option value="Vocabulary" <?php
                    if(isset($_POST['type']) && strcmp($_POST['type'],'Vocabulary')==0) echo "selected";
                ?>>Vocabulary</option>
                <option value="Reading" <?php
                    if(isset($_POST['type']) && strcmp($_POST['type'],'Reading')==0) echo "selected"
                ?>>Reading</option>
            </select>

            <select name="level" class="level">
                <option value="empty">Level</option>
                <option value="pre_inter" <?php
                    if(isset($_POST['level']) && strcmp($_POST['level'],'pre_inter')==0) echo "selected"
                ?>>Pre-Inter</option>
                <option value="inter" <?php
                    if(isset($_POST['level']) && strcmp($_POST['level'],'inter')==0) echo "selected"
                ?>>Intermediate</option>
                <option value="adv_inter" <?php
                    if(isset($_POST['level']) && strcmp($_POST['level'],'adv_inter')==0) echo "selected"
                ?>>Advanced</option>
            </select>
        </div>
        <div class="element">
            <label for="comment">Comment:  <span>(What's this question about?)(optional)</span></label>
            <input class="text" type="text" name="comment" value="<?php
            if(isset($_POST['comment']) && !empty($error)) echo $_POST['comment'];
            ?>"/>
        </div>
        <div class="element">
            <label for="choice_a">Choice A:</label>
            <input class="text" type="text" name="choice_a" value="<?php
                if(isset($_POST['choice_a']) && !empty($error)) echo $_POST['choice_a'];
            ?>"/>
            <label for="choice_b">Choice B:</label>
            <input class="text" type="text" name="choice_b" value="<?php
                if(isset($_POST['choice_b']) && !empty($error)) echo $_POST['choice_b'];
            ?>"/>
            <label for="choice_c">Choice C:</label>
            <input class="text" type="text" name="choice_c" value="<?php
                if(isset($_POST['choice_c']) && !empty($error)) echo $_POST['choice_c'];
            ?>"/>
            <label for="choice_d">Choice D:</label>
            <input class="text" type="text" name="choice_d" value="<?php
                if(isset($_POST['choice_d']) && !empty($error)) echo $_POST['choice_d'];
            ?>"/>
            <div class="sep"></div>
        </div>
        <div class="element">
            <label for="answer">Answer: <span class="red">(required)</span></label>
            <select name="answer" >
                <option value="empty">Answer</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button class="ok" type="submit" name="submit">Add</button> <a class="button" href="#">Cancel</a>
    </form>
</div>
