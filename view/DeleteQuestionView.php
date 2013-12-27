<div class="full_w">
    <div class="h_title">Delete Question</div>
    <h2>Are you sure you want to delete this question?</h2>
    <form action="Account/Delete/" method="post">
        <div class="element">
            <input type="radio" name="sure" value="Yes" /> Yes
        </div>
        <div class="element">
            <input type="radio" name="sure" value="No" checked="checked" /> No
        </div>
        <div class="element">
            <input type="submit" name="submit" value="Submit" />
        </div>
        <input type="hidden" name="qid" value="<?php echo $_GET['qid'] ?>" />
    </form>
</div>