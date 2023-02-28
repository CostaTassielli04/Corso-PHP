<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleria d'arte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php 
        // definizione delle variabili
    $host = "localhost";
    $user = "5a";
    $pass = "dbA1dmin5";
    $db = "5a_tassielli_abigliamenti";

    // connessione al DBMS con il procedimento ad oggetti
    $conn= new mysqli ($host, $user, $pass, $db);
    if($conn->connect_error){
         die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
    }
    else{
        $tabella="SELECT Quadri.titolo AS titolo ,Artisti.nome AS nome_artista,Tecniche.tecnica AS tecnica FROM Quadri INNER JOIN Tecniche ON Tecniche.ID_tecnica=Quadri.id_tecnica 
        INNER JOIN Artisti ON Artisti.ID_artista=Quadri.id_artista 
        WHERE titolo LIKE '%$valore%' OR nome_artista LIKE '%$valore%' OR tecnica LIKE '%$valore%'";
        $result=$conn->query($tabella) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);?>

        <form action="master.php" method="POST" class="login">
        <div class="form-group">
        <input type="text" name="valore" placeholder="inserisci qualocosa..." ><br></div>

        <div class="card-footer">
        <button type="submit" class="btn btn-success" value="invia" name="invia">Cerca</button>
        <button type="reset" class="btn btn-warning"  value="cancella" name="cancella">Cancella</button>
        </div>
        </form>
        
        <div class="row">
        <div class="col">
        <!--!qui mettere i vari quadri-->
        </div>
        

    <?php }?>
</body>
</html>
<?php $conn->close();?>