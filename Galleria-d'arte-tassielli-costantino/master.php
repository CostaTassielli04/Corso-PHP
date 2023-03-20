<?php
$host = "localhost";
$user = "root";
$pass = "Kost4_JJ?";
$db = "esercizi";

// connessione al DBMS con il procedimento ad oggetti
$conn= new mysqli ($host, $user, $pass, $db);
if($conn->connect_error){
     die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
}else{
    doShow($conn);
}

   function doShow($conn){
        if(!isset($_POST['invia'])){ //recupero il campo testuale inserito dall'utente
            $valore='';
        }else{
            $valore=$_POST['valore'];
        }

        $tabella="SELECT quadri.immagine,quadri.titolo AS titolo ,artisti.nome AS nome_artista,tecniche.tecnica AS tecnica FROM quadri INNER JOIN tecniche ON tecniche.ID_tecnica=quadri.id_tecnica 
        INNER JOIN artisti ON artisti.ID_artista=quadri.id_artista 
        WHERE titolo LIKE '%$valore%' OR artisti.nome LIKE '%$valore%' OR tecnica LIKE '%$valore%'";
        $result=$conn->query($tabella) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
        
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
                    <form method="POST" action="?option=detail">
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
    }
}
$conn->close();
        
