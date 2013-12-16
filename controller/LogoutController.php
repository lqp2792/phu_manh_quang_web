<?php
    class LogoutController {
        public function invoke() {
            $page_title = 'Log out';
            session_start();
            session_destroy();
            $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            header("Location: $url");
            exit();
        }
    }
?>