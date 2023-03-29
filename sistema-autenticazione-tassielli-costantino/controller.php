<?php
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

    switch($opzione){
        case 'login':
            require 'login.php';
            break;
        case 'registrazione':
            require 'registrazione.php';
            break;
        default:
            require 'default.php';
            doDefault();
            break;
        
    }