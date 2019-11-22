<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>/css/detail.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>/css/review.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>/css/history.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>/css/buyticket.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <title><?php echo $data['judul'] ?></title>
    <script type="text/javascript" src="<?php echo BASEURL ?>/js/buyticket.js"></script>
</head>

<body>
    <ul class="navbar">
        <li id="engima">
            <a href="<?php echo BASEURL; ?>">
                <span id="engifont">Engi</span>
                <span id="mafont">ma</span>
            </a>
        </li>
        <li id="search">
            <div class="buttonwrap">
                <form action="<?php echo BASEURL ?>/search/searching" method="GET">
                    <input type="text" placeholder="Search movie" name="moviesearch">
                    <button type="submit"><img class="searchicon" src="<?php echo BASEURL ?>/img/searchicon.png"></button>
                </form>
            </div>
        </li>
        <?php
        if (isset($_GET['moviesearch'])) {
            echo $_GET['moviesearch'];
        }
        ?>
        <li id="logout">
            <a href="<?php echo BASEURL ?>/logout/out_account">
                <p id="transactionlogoutfont">Logout</p>
            </a>
        </li>
        <li id="transactions">

        </li>
    </ul>
