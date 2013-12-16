<div class="full_w">
    <div class="h_title">Result!</div>
    <?php
        echo '<div class="n_ok"><p>Successful</p></div>';
        echo '<p>Username:'.$this->model->username.'</p>';
        echo '<p>First Name:'.$this->model->first_name.'</p>';
        echo '<p>Last Name:'.$this->model->last_name.'</p>';
        echo '<p>Email:'.$this->model->email.'</p>';
    ?>
</div>
