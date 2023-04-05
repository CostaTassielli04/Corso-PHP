<?php
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

    switch($opzione){
        case 'create':
            require 'create-film.php';
            doInsert();
            break;
        case 'read':
            require 'master.php';
            doList();
            break;
        default:
            require 'default.php';
            doDefault();
            break;
        
    }