<div id="sidebar">
    <div class="box">
        <div class="h_title">&#8250; Main control</div>
        <ul id="home">
            <li class="b1"><a class="icon view_page" href="">Homepage</a></li>
            <li class="b2"><a class="icon report" href="Account/">Account Panel</a></li>
            <li class="b1"><a class="icon add_page" href="">Add new page</a></li>
            <li class="b2"><a class="icon config" href="">Site config</a></li>
        </ul>
    </div>
    <?php if(isset($_SESSION['username']) && (get_class($this)=='AccountController')) {
            echo '<div class="box">
            <div class="h_title">&#8250; Manage Database</div>
            <ul>
                <li class="b2"><a class="icon add_page" href="Account/Add/">Add New Question</a></li>
                <li class="b1"><a class="icon page" href="Account/Show/">Show All Questions</a></li>
                <li class="b2"><a class="icon category" href="Account/QuestionHistory/">Question History</a></li>
            </ul>
            </div>';

            echo '<div class="box">
            <div class="h_title">&#8250; Test Control</div>
            <ul>
                <li class="b1"><a class="icon users" href="Account/Create/">Take a test</a></li>
                </ul>
            </div>';
        }
    ?>

<!--    <div class="box">-->
<!--        <div class="h_title">&#8250; Users</div>-->
<!--        <ul>-->
<!--            <li class="b1"><a class="icon users" href="">Show all users</a></li>-->
<!--            <li class="b2"><a class="icon add_user" href="">Add new user</a></li>-->
<!--            <li class="b1"><a class="icon block_users" href="">Lock users</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="box">-->
<!--        <div class="h_title">&#8250; Settings</div>-->
<!--        <ul>-->
<!--            <li class="b1"><a class="icon config" href="">Site configuration</a></li>-->
<!--            <li class="b2"><a class="icon contact" href="">Contact Form</a></li>-->
<!--        </ul>-->
<!--    </div>-->
</div>