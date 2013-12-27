<div id="sidebar">
    <div class="box">
        <div class="h_title">&#8250; Main Control</div>
        <ul id="home">
            <li class="b1"><a class="icon view_page" href="Homepage/">Homepage</a></li>
            <?php if(isset($_SESSION['username'])) echo '<li class="b2"><a class="icon report" href="Account/">Account Panel</a></li>'; ?>
            <?php if(!isset($_SESSION['username'])) echo '<li class="b1"><a class="icon add_user" href="Homepage/Register/">Register</a></li>'; ?>
            <?php if(isset($_SESSION['username'])) echo '<li class="b2"><a class="icon users" href="Homepage/Logout/">Log out</a></li>';
            else {
                echo '<li class="b2"><a class="icon users" href="Homepage/Login/">Login</a></li>';
            }?>

        </ul>
    </div>
    <?php
        if(isset($_SESSION['username']) && (get_class($this)=='AccountController' && $_SESSION['admin'])) {
            echo '<div class="box">
            <div class="h_title">&#8250; Manage Database</div>
            <ul id="home">
                <li class="b2"><a class="icon add_page" href="Account/Add/">Add New Question</a></li>
                <li class="b1"><a class="icon page" href="Account/Show/">Show All Questions</a></li>
                <li class="b2"><a class="icon report" href="Account/QuestionHistory/">Question History</a></li>
                <li class="b2"><a class="icon edit" href="Account/Search/">Search Questions</a></li>
            </ul>
            </div>';

            echo '<div class="box">
            <div class="h_title">&#8250; Test </div>
                <ul id="home">
                    <li class="b1"><a class="icon users" href="Account/Create/">Take a test</a></li>
                    <li class="b2"><a class="icon report" href="Account/HighScores/">High Scores</a></li>
                    <li class="b2"><a class="icon page" href="Account/History/">Test History</a></li>
                </ul>
            </div>';
        }
        if(isset($_SESSION['username']) && (get_class($this)=='AccountController' && !$_SESSION['admin'])) {
            echo '<div class="box">
                <div class="h_title">&#8250; Manage Database</div>
                <ul id="home">
                    <li class="b2"><a class="icon add_page" href="Account/Add/">Add New Question</a></li>
                </ul>
                </div>';

            echo '<div class="box">
                <div class="h_title">&#8250; Test </div>
                    <ul id="home">
                        <li class="b1"><a class="icon users" href="Account/Create/">Take a test</a></li>
                        <li class="b2"><a class="icon report" href="Account/HighScores/">High Scores</a></li>
                        <li class="b2"><a class="icon page" href="Account/History/">Test History</a></li>
                    </ul>
                </div>';
        }
    ?>
    <div class="box">
        <div class="h_title">&#8250; Web Info</div>
        <ul id="home">
            <li class="b1"><a class="icon contact" href="Homepage/Support/">Support</a></li>
            <li class="b1"><a class="icon add_page" href="Homepage/Guide/">How to use!</a></li>
            <li class="b2"><a class="icon view_page" href="Homepage/About/">About us!</a></li>
        </ul>
    </div>
</div>