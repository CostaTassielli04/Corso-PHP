<?php
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

    switch($opzione){
        case 'form':
            require 'form.php';
            break;
        case 'master':
            require 'master.php';
            break;
        case 'detail':
            require 'detail.php';
            break;
        default:
            require 'default.php';
            doDefault();
            break;
        
    }

