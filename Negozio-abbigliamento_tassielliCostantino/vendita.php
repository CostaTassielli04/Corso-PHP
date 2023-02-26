<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Vendite</title>
</head>
<body>
<h3 style="text-align: center;">Vendite Articoli</h3>
    <?php
    // definizione delle variabili
    $host = "localhost";
    $user = "5a";
    $pass = "dbA1dmin5";
    $db = "5a_tassielli_abigliamenti";

    // connessione al DBMS con il procedimento ad oggetti
    $mysqli= new mysqli ($host, $user, $pass, $db);
    if($mysqli->connect_error){
         die ("<br>Connessione non riuscita " . $mysqli->connect_error . " " . $mysqli->connect_errno);
    }
    else{
        if(!isset($_POST['invia'])){
            Prenotazione();
        }else{
            Erogazione();
        }
    }
    
    function Prenotazione(){ //con questa funzione invio i dati necessari per effettuare a vendita di uno degli articoli del database
        global $mysqli;
        $sql="SELECT DISTINCT CodiceArticolo FROM Articoli";
        $sql2="SELECT DISTINCT nome,cognome FROM Dipendenti";
        $consumatori=$mysqli->query($sql2);
        $pezzi=$mysqli->query($sql);
        
        echo <<<fine
        <form action="vendita.php" method="POST" class="login">
            <div class="form-group">
            <label for="quantita">Qta:</label>
            <input type="number" name="quantita" min=0 step=1><br>

            <label for="prezzo">Prezzo:</label>
            <input type="number" name="prezzo" placeholder="£0.00" step=0.1 min=0><br>

            <label for="data">Data:</label>
            <input type="date" name="data" placeholder="25-10-2022" ><br>

             <label for="codice">Codice Articolo:</label>
            <select  aria-label="Disabled select example" name="codice">
            <option selected></option>
        fine;
                    while ($row = $pezzi->fetch_assoc()){
                        ?>
                    <option ><?php echo $row['CodiceArticolo']?></option>
                <?php }?>   
                </select><br>
                <select  aria-label="Disabled select example" name="dipendente">
                <option selected></option>
                <?php  while ($record = $consumatori->fetch_assoc()){
                        ?>
                    <option><?php echo $record['cognome'] ." ". $record['nome']?></option>
                <?php }?>   
                </select><br>
                <div class="card-footer">
                <button type="submit" class="btn btn-success" value="invia" name="invia">Vendi</button>
                <button type="reset" class="btn btn-warning"  value="cancella" name="cancella">Cancella</button>
                </div>
        </form>
        <?php
    }

    function Erogazione(){
        global $mysqli;
        //recupero i parametri dal form
        $qta=$_POST['quantita'];
        $prezzo=$_POST['prezzo'];
        $data=$_POST['data'];
        $codice=$_POST['codice'];
        $dip=$_POST['dipendente'];

        //queries N.B:(verificare il nome delle colonne del database)
        $query2="SELECT IdDipendente FROM Dipendenti WHERE cognome IN('$dip') AND nome IN('$dip')";
        $result=$mysqli->query($query2)  or die ("<br>Connessione non riuscita " . $mysqli->error . " " . $mysqli->errno);
        $riga=$result->fetch_assoc();
        $id_dip=$riga['IdDipendente'];
        $query="INSERT INTO Vendite(Quantita,Prezzo,DataVendita,CodArticolo,IdDipendente) VALUES($qta,$prezzo,'$data','$codice',$id_dip)";
        $result=$mysqli->query($query) or die ("<br>Connessione non riuscita " . $mysqli->error . " " . $mysqli->errno);
        
        //vado nell'altra pagina a visualizzare nel dettaglio il prodotto comprato
        echo "<h2>Vendita effettuata con successo!!</h2>";
        echo<<<fine
        <form action="vedi-articolo.php" method="POST">
        <input type="hidden" value="$prezzo" name="price">
        <button type="submit" class="btn btn-success" value="$codice" name="ispeziona">Ispeziona Vendita</button>
        </form>
        fine;
    }

    ?>
</body>
</html>
<?php $mysqli->close();?>