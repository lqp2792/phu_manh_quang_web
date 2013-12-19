<div class="full_w">
    <script>
        $(document).ready(function() {
            $(".level").hide();
            $(".type").change(function() {
                var option = $(this).val();
                if(option != "empty")  {
                    $(".level").show();
                } else {
                    $(".level").hide();
                }
            });
        });
    </script>
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
                <option value="TOEIC">TOEIC</option>
                <option value="TOEFL">TOEFL</option>
                <option value="ESL">ESL</option>
                <option value="GRE">GRE</option>
                <option value="SAT">SAT</option>
                <option value="GMAT">GMAT</option>
            </select>
        </div>

        <div class="element">
            <label for="type">Type <span class="red">(required)</span></label>
            <select name="type" class="type">
                <option value="empty">Question Type</option>
                <option value="Grammar">Grammar</option>
                <option value="Vocabulary">Vocabulary</option>
                <option value="Reading">Reading</option>
            </select>

            <select name="level" class="level">
                <option value="empty">Level</option>
                <option value="pre_inter">Pre-Inter</option>
                <option value="inter">Intermediate</option>
                <option value="adv_inter">Advanced</option>
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
