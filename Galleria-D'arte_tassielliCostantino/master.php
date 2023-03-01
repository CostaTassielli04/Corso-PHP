<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleria d'arte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color:aquamarine ;">
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
    else{
        if(!isset($_POST['invia'])){ //recupero il campo testuale inserito dall'utente
            $valore='';
        }else{
            $valore=$_POST['valore'];
        }
        $tabella="SELECT quadri.immagine,quadri.titolo AS titolo ,artisti.nome AS nome_artista,tecniche.tecnica AS tecnica FROM quadri INNER JOIN tecniche ON tecniche.ID_tecnica=quadri.id_tecnica 
        INNER JOIN artisti ON artisti.ID_artista=quadri.id_artista 
        WHERE titolo LIKE '%$valore%' OR artisti.nome LIKE '%$valore%' OR tecnica LIKE '%$valore%'";
        $result=$conn->query($tabella) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);?>

        <form action="master.php" method="POST" class="login">
        <div class="form-group">
        <input type="text" name="valore" placeholder="inserisci artista,nome opera o tecnica d'opera..." ><br>
        </div>

        <div class="card-footer">
        <button type="submit" class="btn btn-primary" value="invia" name="invia">Cerca</button>
        <button type="reset" class="btn btn-warning"  value="cancella" name="cancella">Cancella</button>
        </div>
        </form><hr>
        <h3 style="text-align: center;">Museo</h3><br>
        
        
        <?php
         //stampo la card con le seguenti caratteristiche per ogni opera del nostro database
        $conta=0;
        while($quadro=$result->fetch_assoc()){
            if($conta==0){?>
                <div class="row">
           <?php }
           $conta++;
           ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $quadro['immagine']?>" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $quadro['titolo']?></h5>
                    <p class="card-text">Realizzata da: <?php echo $quadro['nome_artista']." che ha adottato la tecnica ".$quadro['tecnica'] ?></p>
                    <form method="POST" action="detail.php">
                        <button type="submit" class="btn btn-success" value="<?php echo $quadro['titolo']?>" name="opera">Scopri di più</button>
                    </form>
                </div>
            </div>
        </div>
       <?php 
        if($conta==3){
            $conta=0;?>
                </div><?php 
        }
    }?>
        
    <?php }?>
</body>
</html>
<?php $conn->close();?>