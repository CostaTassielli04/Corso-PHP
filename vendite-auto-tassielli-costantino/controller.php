<?php
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

    switch($opzione){
        case 'home':
            require 'master.php';
            break;
        case 'form':
            require 'form.php';
            break;
        case 'list':
            require 'lista-clienti.php';
            break;
        default:
            require 'default.php';
            doDefault();
            break;
        
    }