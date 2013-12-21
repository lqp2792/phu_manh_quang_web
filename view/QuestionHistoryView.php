<div class="full_w">
    <div class="h_title">Question History</div>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User added</th>
            <th scope="col">Create Date</th>
        </tr>
        </thead>

        <tbody>
        <?php
        for($j=0;$j<10;$j++) {
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td class='align-center'>".$row['qid']."</td>";
            echo "<td class='align-center'>".$row['user_added']."</td>";
            echo "<td class='align-center'>".$row['date_added']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "<div class='entry'>";
        echo "<div class='pagination'>";

        switch($page){
            case 1:
                echo "<span class='active'>".($page)."</span>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($num_page-1)."/'>".($num_page-1)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>".$num_page."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>Last</a>";
                break;
            case $num_page-3:
                echo "<a href='Account/QuestionHistory/1/'>First</a>";
                echo "<a href='Account/QuestionHistory/1/'>1</a>";
                echo "<a href='Account/QuestionHistory/2/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($page-1)."/'>".($page-1)."</a>";
                echo "<span class='active'>".($page)."</span>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>Last</a>";
                break;
            case $num_page-2:
                echo "<a href='Account/QuestionHistory/1/'>First</a>";
                echo "<a href='Account/QuestionHistory/1/'>1</a>";
                echo "<a href='Account/QuestionHistory/2/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($page-1)."/'>".($page-1)."</a>";
                echo "<span class='active'>".($page)."</span>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>Last</a>";
                break;
            case $num_page-1:
                echo "<a href='Account/QuestionHistory/1/'>First</a>";
                echo "<a href='Account/QuestionHistory/1/'>1</a>";
                echo "<a href='Account/QuestionHistory/2/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($page-2)."/'>".($page-2)."</a>";
                echo "<a href='Account/QuestionHistory/".($page-1)."/'>".($page-1)."</a>";
                echo "<span class='active'>".($page)."</span>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>Last</a>";
                break;
            case $num_page:
                echo "<a href='Account/QuestionHistory/1/'>First</a>";
                echo "<a href='Account/QuestionHistory/1/'>1</a>";
                echo "<a href='Account/QuestionHistory/2/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($page-3)."/'>".($page-3)."</a>";
                echo "<a href='Account/QuestionHistory/".($page-2)."/'>".($page-2)."</a>";
                echo "<a href='Account/QuestionHistory/".($page-1)."/'>".($page-1)."</a>";
                echo "<span class='active'>".($page)."</span>";
                break;
            default:
                echo "<a href='Account/QuestionHistory/1/'>First</a>";
                echo "<a href='Account/QuestionHistory/".($page-1)."/'>".($page-1)."</a>";
                echo "<span class='active'>".($page)."</span>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<a href='Account/QuestionHistory/".++$page."/'>".($page)."</a>";
                echo "<span>...</span>";
                echo "<a href='Account/QuestionHistory/".($num_page-1)."/'>".($num_page-1)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>".($num_page)."</a>";
                echo "<a href='Account/QuestionHistory/".($num_page)."/'>Last</a>";
                break;

        }

        echo "</div>";
        ?>


