<div class="full_w">
    <div class="h_title">Edit Questions</div>
    <form action="Account/Search/" method="post">
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
            <input type="submit" name="submit" value="Search" />
        </div>
    </form>
    <table>
        <thead>
        <tr>
            <th scope="col">QID</th>
            <th scope="col">Content</th>
            <th scope="col">Choice A</th>
            <th scope="col">Choice B</th>
            <th scope="col">Choice C</th>
            <th scope="col">Choice D</th>
            <th scope="col">Answer</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if(isset($set)) {
                while($question = mysqli_fetch_array($set, MYSQL_ASSOC)) {
                    echo '<tr>
                            <td class="align-center">'.$question['qid'].'</td>
                            <td class="align-center">'.$question['content'].'</td>
                            <td class="align-center">'.$question['choice_a'].'</td>
                            <td class="align-center">'.$question['choice_b'].'</td>
                            <td class="align-center">'.$question['choice_c'].'</td>
                            <td class="align-center">'.$question['choice_d'].'</td>
                            <td class="align-center">'.$question['answer'].'</td>
                            <td>
								<a href="Account/Edit/'.$question['qid'].'" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title="Archive"></a>
								<a href="Account/Delete/'.$question['qid'].'" class="table-icon delete" title="Delete"></a>
							</td>
                            </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>