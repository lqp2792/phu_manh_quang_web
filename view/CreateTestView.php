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
    <div class="h_title">Create a Test</div>
    <form action="" method="post">
        <div class="element">
            <label for="type">Test Type <span>(If you want to focus on a field)</span></label>
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
            <label for="exam">Exam <span>(If you want to take questions from exams)</span></label>
            <select name="exam" >
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
            <label for="page">Question Number <span class="red">(required)</span></label>
            <select name="page" >
                <option value="0">Number</option>
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="element">
            <input class="button" type="submit" name="submit" value="Create a Test" />
        </div>
    </form>
</div>