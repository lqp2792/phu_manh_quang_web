<div class="full_w">
    <div class="h_title">High Scores</div>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">High Scores</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) {
                    echo '<tr>
                    <td class="align-center"><a href="Account/Visit/'.$row['username'].'">'.$row['username'].'</a></td>
                    <td class="align-center">'.$row['first_name'].'</td>
                    <td class="align-center">'.$row['last_name'].'</td>
                    <td class="align-center">'.$row['high_score'].'</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>