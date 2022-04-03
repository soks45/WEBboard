<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "dbconnect.php";
    require "auth.php";
    require "menu.php";
    if (isset($_SESSION['login']))
        switch ($_GET['page']) {
            case 'property':
                require "property.php";
                break;
            case 'rent':
                require "rent.php";
                break;
        }