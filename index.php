<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "dbconnect.php";
    switch ($_GET['page']) {
        case 'property':
            require "property.php";
            break;
        case 'rent':
            require "rent.php";
            break;
    }