<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
    <base href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'?>" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Le Quang Phu" />
    <title><?php echo $page_title?></title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="public/css/navi.css" media="screen" />
    <script type="text/javascript" src="public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".box .h_title").not(this).next("ul").hide("normal");
            $(".box .h_title").not(this).next("#home").show("normal");
            $(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
        });
    </script>
</head>
<body>
<div class="wrap">
    <div id="header">
        <div id="top">
            <div class="left">
                <?php
                    if(isset($_SESSION['username'])) {
                        echo '<p>Welcome, <strong>'.$_SESSION['username'].'</strong> [ <a href="Homepage/Logout/">logout</a> ]</p>';
                    } else {
                        echo '<p>English Test, Yolo !</p>';
                    }
                ?>
            </div>
            <div class="right">
                <div class="align-right">
                    <!--<p>Last login: <strong>23-04-2012 23:12</strong></p>-->
                    <p>Welcome!</p>
                </div>
            </div>
        </div>
        <div id="nav">
            <ul>
                <?php
                    if(isset($_SESSION['username'])) {
                        echo '<li class="upp"><a href="#">Main Menu</a>
                            <ul>
                                <li>&#8250; <a href="Account/ChangePassword/">Change Password</a></li>
                                <li>&#8250; <a href="Homepage/Logout/">Logout</a></li>
                            </ul>
                        </li>';
                    } else {
                        echo '<li class="upp"><a href="#">Main Menu</a>
                            <ul>
                                <li>&#8250; <a href="Homepage/Register/">Register</a></li>
                                <li>&#8250; <a href="Homepage/Login/">Login</a></li>
                            </ul>
                        </li>';
                    }
                ?>
                <?php
                    if(isset($_SESSION['username'])) {
                        echo '<li class="upp"><a href="Account/Create/">Test</a>
                    <ul>
                        <li>&#8250; <a href="Account/Add/">Add New Question</a></li>
                        <li>&#8250; <a href="Account/HighScores/">View Highscores</a></li>
                        <li>&#8250; <a href="Account/History/">Test History</a></li>
                        <li>&#8250; <a href="Account/Create/">Take a Test</a></li>
                    </ul>
                </li>';
                    }
                ?>
                <li class="upp"><a href="Homepage/Support/">Support</a>
                    <ul>
                        <li>&#8250; <a href="Homepage/Support/">Le Quang Phu</a></li>
                        <li>&#8250; <a href="Homepage/Support/">Vu The Manh</a></li>
                        <li>&#8250; <a href="Homepage/Support/">Do Duc Quang</a></li>
                    </ul>
                </li>

                <li class="upp"><a href="Homepage/Guide/">Help</a>
                    <ul>
                        <li>&#8250; <a href="Homepage/Guide/">Guide</a></li>
                        <li>&#8250; <a href="Homepage/About/">About us!</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="content">
        <?php include('layout/sidebar.php'); ?>
        <div id="main">
            <div class="clear"></div>