<?php
/*$host = "localhost";
$user = "5a";
$pass = "dbA1dmin5";
$db = "5a_venditeauto";*/
$host = "localhost";
$user = "root";
$pass = "Kost4_JJ?";
$db = "vendite_auto";

// connessione al DBMS con il procedimento ad oggetti
$conn= new mysqli ($host, $user, $pass, $db);
if($conn->connect_error){
    die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
}