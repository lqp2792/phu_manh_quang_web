<div class="full_w">
    <div class="h_title">Test History</div>
    <table>
        <thead>
        <tr>
            <th scope="col">Test ID</th>
            <th scope="col">Date</th>
            <th scope="col">Score</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) {
            echo '<tr>
                    <td class="align-center">'.$row['tid'].'</td>
                    <td class="align-center">'.$row['date'].'</td>
                    <td class="align-center">'.$row['score'].'</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>