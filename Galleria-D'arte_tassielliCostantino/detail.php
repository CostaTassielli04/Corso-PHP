<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleria d'arte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color:cornsilk ;">
    <?php 
        // definizione delle variabili
    $host = "localhost";
    $user = "5a";
    $pass = "dbA1dmin5";
    $db = "5a_tassielli-costantino-galleria-arte";

    // connessione al DBMS con il procedimento ad oggetti
    $conn= new mysqli ($host, $user, $pass, $db);
    if($conn->connect_error){
         die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
    }
    else{ //recupero il parametro che conterrà il titolo della mia opera da esaminare
        $opera=$_POST['opera'];
        $informazioni="SELECT *, artisti.nome AS nome_artista,tecniche.tecnica AS tecnica FROM quadri INNER JOIN tecniche ON tecniche.ID_tecnica=quadri.id_tecnica 
        INNER JOIN artisti ON artisti.ID_artista=quadri.id_artista WHERE titolo='$opera'";  
        $carica=$conn->query($informazioni) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
    }?>
    <!--!visualizzo le caratteristiche del quadro-->
    <div class="container">
        <?php while($row =$carica->fetch_assoc()){?>
            <h3 style="text-align: center;"><?php echo $row['titolo']?></h3><br>
        <div class="row">
            <div class="col sm-4">
            <img src="<?php echo $row['immagine']?>" width="120" height="150" >
            </div>
            <div class="col sm-6">
                <ul>
                    <li>Altezza: <?php echo "<i>".$row['altezza']." cm</i>"?></li>
                    <li>Larghezza: <?php echo "<i>".$row['larghezza']." cm</i>"?></li>
                    <li>Prezzo: <?php echo "<i>$".$row['prezzo']."</i>"?></li>
                    <li>Tecnica: <?php echo "<i>".$row['nome_artista']."</i>"?></li>
                    <li>Artista: <?php echo "<i>".$row['tecnica']."</i>"?></li>
                </ul>
            </div>
        </div>
    </div>
    <a href="master.php" class="btn btn-danger">Torna alla galleria</a>
    <?php }?>
</body>
</html>
<?php $conn->close();?>