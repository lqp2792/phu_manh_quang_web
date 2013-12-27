<div class="full_w">
    <div class="h_title">Support</div>
    <h2>Submit Your Issue Here:</h2>
    <form action="Homepage/Support/" method="post">
        <div class="element">
            <label for="email">Receiver <span class="red">(required)</span></label>
            <select name="email">
                <option value="lqp.2792@gmail.com">Le Quang Phu</option>
                <option value="lqp.2792@gmail.com">Vu The Manh</option>
                <option value="lqp.2792@gmail.com">Do Duc Quang</option>
            </select>
        </div>
        <div class="element">
            <label for="content">Mail Content <span>(type in your problem)</span></label>
            <textarea name="content" class="textarea" rows="10" ><?php
                if(isset($_POST['content'])) echo $_POST['content'];
                ?></textarea>
        </div>
        <div class="element">
            <label for="yourmail">Your email <span class="red">(required)</span></label>
            <input class="text" type="text" name="youremail" placeholder="Type in your email">
        </div>
        <div class="element">
            <input type="submit" name="submit" value="Send Mail">
        </div>
    </form>
</div>