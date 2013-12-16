<?php
class Controller {

	public function invoke() {
        session_start();
        $page_title = 'Homepage';
        include('layout/header.php');
        include 'view/HomepageView.php';
        include('layout/footer.html');
	}
}

?>