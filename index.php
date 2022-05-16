<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require 'consolelog.php';
    require "dbconnect.php";
    require "auth.php";
    require "menu.php";
    if (isset($_SESSION['login']))
        switch ($_GET['page']) {
            case 'board':
                require 'board.php';
                break;
            case 'property':
                require "property.php";
                break;
            case 'rent':
                require "rent.php";
                break;
            case 'avatar':
                require 'avatarSelector.php';
                break;
            case 'addrent':
                require 'addrent.php';
                break;
        }
    require "footer.php";