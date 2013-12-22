<div class="full_w">
    <div class="h_title">Result!</div>
    <?php
    echo '<div class="n_ok"><p>Successful</p></div>';
    foreach($success as $msg) {
        echo '<p>'."$msg".'</p>';
    }
    ?>
</div>
