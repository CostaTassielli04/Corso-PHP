<?php

/* * ****************************************************
 * Modulo: Main
 * 
 * Programma principale
 * Gestisce il flusso delle operazioni
 * **************************************************** */

//recupera dall'URL con il metodo GET la variabile 'option'
$opzione = filter_input(INPUT_GET, 'option', FILTER_SANITIZE_STRING);

/*
 * Richiama ed esegue il modulo richiesto tramite URL
 * in base al valore della variabile 'option'
 */
switch ($opzione) {
    case "link1":
        require 'link1.php';
        doLink1();
        break;
    case "link2":
        require 'link2.php';
        doLink2();
        break;
    case "menu1":
        require 'menu1.php';
        doMenu1();
        break;
    case "menu2":
        require 'menu2.php';
        doMenu2();
        break;
    case "form":
        require 'form.php';
        doForm();
        break;
    default:
        require 'default.php';
        doDefault();
}
