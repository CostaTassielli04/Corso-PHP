<?php
require 'db-connect.php';
function doList(){
    global $conn;
    if(!isset($_POST['email']) ){
        $search='';
    }else{
        $search=$_POST['email'];
        $search=mysqli_real_escape_string($conn, $search);
    }
    $elenco="SELECT nome,anno_uscita,categoria FROM Film WHERE nome LIKE '%?%' OR anno_uscita LIKE '%?%' categoria LIKE '%?%'";
    $stmt = $conn->prepare($elenco);
    $stmt->bind_param("is", $search);
}