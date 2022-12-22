<?php 
include('index.html');
session_start();
$listino=$_SESSION['listino']; //recupero il menù salvato su sessione

if(!isset($_POST['invia'])){
    Ordina($listino);  
}else{
    $num=$_POST['quantita']; //recupero il vettore delle varie quantità per ogni nome associato
    $nomi=$_POST['nomi']; //recupero ogni nome inserito nel menù a tendina
    for($i=0;$i<count($listino);$i++){
        for($k=$i+1;$k<count($nomi);$k++){ //con questo ciclo sommo le quantità dei prodotti uguali 
            if($nomi[$i]==$nomi[$k]){
                $num[$i]=$num[$i]+$num[$k];
                $num[$k]=0;
            }  
        }
    }
    Erogazione($listino,$num);
}

function Erogazione($listino,$quantita){ //con questa funzione recupero i dati dell'utente inviati tramite form e calcolo la sua spesa totale
    $spesa=0;
    $utente=$_POST['utente'];
    $indirizzo=$_POST['indirizzo'];
    $appellitivo=$_POST['Cliente'];
    echo"<i><strong>Egr. ". $appellitivo ." </strong>". $utente ."</i><br>"; 
    echo"Ordine effettuato con successo!!<br>Il vostro ordine:<br>";
    echo "<ul>";
    $j=0;
    foreach($listino as $prodotto=>$prezzo){
        echo "<li><b>".$quantita[$j]."x </b>$prodotto (£$prezzo)</li>";
        $spesa=$spesa+($prezzo*$quantita[$j]);
        $j++;
    }
    echo "</ul>";
    echo"<br>Grazie per aver scelto la nostra pizzeria, il vostro ordine arriverà presto al seguente indirizzo:<br>
    $indirizzo";
    echo"<hr><hr><b>Totale: </b><i>£ $spesa</i>"; 
}

function Ordina($listino){    //con questa funzione invio un ordine con le rispettive informazioni dell'utente
   
 echo<<<FINE
        <div class="card-body">
        <div class="form-group">
        <form action="ordina.php" method="POST">
        <label for="utente">Nome e Cognome:</label>
        <input type="text" class="form-control" name="utente" placeholder="Mario Rossi" required>
        </div>
        <div class="form-group">
        <label for="indirizzo">Indirizzo:</label>
        <input type="text" class="form-control" name="indirizzo" placeholder="Via Roma,15-Acquaviva" required>
        </div><br>
        <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Cliente" value="Signor" required>
        <label class="form-check-label" for="Cliente">Signor</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Cliente" value="Signora" required>
        <label class="form-check-label" for="Cliente">Signora</label>
        </div>
        </div><br>
        <div class="container">
        FINE;
        for($i=0;$i<count($listino);$i++){ // stampo il menù a tendina per ogni numero del mio menu
            echo"
            <div class=\"form-check sm-6\">
            <select class=\"form-select\" name=\"nomi[]\">
            <option selected>Menu'</option>";
            foreach($listino as $product=>$price){
                echo"<option value=\"$product \">$product(£ $price)</option>";
            }
            echo<<<SELECT
            </select>
            </div>
            <div class="form-check sm-6">
            <label for="quantita" style="color:blue;">Quantità</label>
            <input type="number" name="quantita[]" class="form-control" min="0" step="1" value="0">
            </div> <br><br>
            SELECT;
        }
        echo<<<FINE
        <div class="card-footer">
        <button type="submit" class="btn btn-primary" value="invia" name="invia">Invia Ordine</button>
        <button type="reset" class="btn btn-danger float-right" value="cancella" name="cancella">Cancella Ordine</button>
        </form>
        </div>
        </div>
        FINE;
        
}

