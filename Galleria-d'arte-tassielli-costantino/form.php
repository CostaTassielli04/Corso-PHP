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
    doInsert($conn);
}

function doInsert($conn) {
    
    if (!isset($_POST['invio'])) {
        form($conn);
    } else {
        elabora($conn);
        $conn->close();
    }
}

function form($conn) {

    $artisti="SELECT pseudonimo FROM artisti";
    $result1=$conn->query($artisti) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
    $tecniche="SELECT tecnica FROM tecniche";
    $result2=$conn->query($tecniche) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno); 
    
   
   echo "</div></div><hr>";
   echo "<h4>Inserisci un'opera</h3>";
    echo <<< FORM
        <div class="col-12"> 
            <form role="form" class="col-xs-12 col-md-4"  method="post">
            <div class="form-group">
                <label>Titolo Opera</label>
                <input type="text" class="form-control" name="titolo" required>
           </div>

           <div class="form-group">
             <label>Artista</label>
             <select  aria-label="Disabled select example" name="artista" required>
                <option selected></option>
    FORM;
                while ($pittore = $result1->fetch_assoc()){
                        ?>
                    <option><?php echo $pittore['pseudonimo']?></option>
                <?php }?>   
                </select><br>
           </div>

           <div class="form-group">
             <label>Tecnica</label>
             <select  aria-label="Disabled select example" name="tecnica" required>
                <option selected></option>
                <?php
                while ($strategia = $result2->fetch_assoc()){
                        ?>
                    <option><?php echo $strategia['tecnica']?></option>
                <?php }?>   
                </select><br>
           </div>

           <div class="form-group">
             <label>Link Immagine</label>
             <input type="url" class="form-control" name="img" required>
           </div>

           <div class="form-group">
             <label>Altezza</label>
             <input type="number" class="form-control" name="altezza" required>
           </div>

           <div class="form-group">
             <label>Larghezza</label>
             <input type="number" class="form-control" name="larghezza" required>
           </div>

           <div class="form-group">
             <label>Prezzo</label>
             <input type="number" class="form-control" name="prezzo" required>
           </div>

          <button type="submit" name="invio" class="btn btn-primary">Aggiungi opera</button>
        </form> 
    </div> 
 <?php }

function elabora($conn) {
    
    $titolo=filter_input(INPUT_POST, 'titolo', FILTER_SANITIZE_STRING);
    $artista=filter_input(INPUT_POST, 'artista', FILTER_SANITIZE_STRING);
    $tecnica=filter_input(INPUT_POST, 'tecnica', FILTER_SANITIZE_STRING);
    $img=filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $altezza=filter_input(INPUT_POST, 'altezza', FILTER_SANITIZE_NUMBER_INT);
    $larghezza=filter_input(INPUT_POST, 'larghezza', FILTER_SANITIZE_NUMBER_INT);
    $prezzo=filter_input(INPUT_POST, 'prezzo', FILTER_SANITIZE_NUMBER_INT);

    $query_tecnica="SELECT ID_tecnica,tecnica FROM tecniche WHERE tecnica='$tecnica'";
    $cod_tecnica=$conn->query($query_tecnica) or die ("Query non riuscita" . $conn->error . " " . $conn->errno); 
    $query_artista="SELECT ID_Artista,pseudonimo FROM artisti WHERE pseudonimo='$artista'";
    $cod_artista=$conn->query($query_artista) or die ("Query non riuscita" . $conn->error . " " . $conn->errno); 
    $id1=array();
    $id2=array();

    while ($id_tecnica = $cod_tecnica->fetch_assoc()){
        $id1[]=$id_tecnica['ID_tecnica'];
        while ($id_artista = $cod_artista->fetch_assoc()){
            $id2[]=$id_artista['ID_Artista'];
            $aggiunta="INSERT INTO quadri(id_artista,id_tecnica,titolo,immagine,altezza,larghezza,prezzo) VALUES($id2[0],$id1[0],'$titolo','$img',$altezza,$larghezza,$prezzo)";
            $aggiungi_record=$conn->query($aggiunta) or die ("Query non riuscita" . $conn->error . " " . $conn->errno); 
        }
    }
   

    echo <<<FORM
    <div style="background-color:green;"><p>Nuovo record inserito correttamente</p></div>
    <form action="?option=detail" method="POST">
    <input type="hidden" name="opera" value="$titolo">
    <button type="submit" name="ispeziona" class="btn btn-primary">Mostra dettagli opera</button>
    </form>
    FORM;
    
}


