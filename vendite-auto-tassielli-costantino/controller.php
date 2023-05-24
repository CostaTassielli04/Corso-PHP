<?php
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

    switch($opzione){
        case 'home':
            require 'master.php';
            break;
        default:
            require 'default.php';
            doDefault();
            break;
        
    }