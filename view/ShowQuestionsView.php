<div class="full_w">
    <div class="h_title">Show All Questions</div>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Content</th>
            <th scope="col">Exam</th>
            <th scope="col">Type</th>
            <th scope="col">Choice A</th>
            <th scope="col">Choice B</th>
            <th scope="col">Choice C</th>
            <th scope="col">Choice D</th>
            <th scope="col">Answer</th>
        </tr>
        </thead>

        <tbody>
        <?php
            for($j=0;$j<10;$j++) {
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td class='align-center'>".$row['qid']."</td>";
            echo "<td>".$row['content']."</td>";
            echo "<td>".$row['exam']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['choice_a']."</td>";
            echo "<td>".$row['choice_b']."</td>";
            echo "<td>".$row['choice_c']."</td>";
            echo "<td>".$row['choice_d']."</td>";
            echo "<td>".$row['answer']."</td>";
            echo "</tr>";
            }
        echo "</table>";
        echo "</div>";
        echo "<div class='entry'>";
        echo "<div class='pagination'>";
        echo "<a href='Account/Show/0/'>First</a>";
        switch($page){
            case 0:
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<span>...</span>";
                echo "<a href='Account/Show/".($num_page-2)."/'>".($num_page-1)."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>".$num_page."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;
            case $num_page-4:
                echo "<a href='Account/Show/0/'>1</a>";
                echo "<a href='Account/Show/1/'>2</a>";
                echo "<span>...</span>";
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;
            case $num_page-3:
                echo "<a href='Account/Show/0/'>1</a>";
                echo "<a href='Account/Show/1/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/Show/".($page-1)."/'>".($page)."</a>";
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;
            case $num_page-2:
                echo "<a href='Account/Show/0/'>1</a>";
                echo "<a href='Account/Show/1/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/Show/".($page-2)."/'>".($page-1)."</a>";
                echo "<a href='Account/Show/".($page-1)."/'>".($page)."</a>";
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;
            case $num_page-1:
                echo "<a href='Account/Show/0/'>1</a>";
                echo "<a href='Account/Show/1/'>2</a>";
                echo "<span>...</span>";
                echo "<a href='Account/Show/".($page-3)."/'>".($page-2)."</a>";
                echo "<a href='Account/Show/".($page-2)."/'>".($page-1)."</a>";
                echo "<a href='Account/Show/".($page-1)."/'>".($page)."</a>";
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;
            default:
                echo "<a href='Account/Show/".($page-1)."/'>".($page)."</a>";
                echo "<span class='active'>".($page+1)."</span>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<a href='Account/Show/".++$page."/'>".($page+1)."</a>";
                echo "<span>...</span>";
                echo "<a href='Account/Show/".($num_page-2)."/'>".($num_page-1)."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>".$num_page."</a>";
                echo "<a href='Account/Show/".($num_page-1)."/'>Last</a>";
                break;

        }

        echo "</div>";
        ?>


