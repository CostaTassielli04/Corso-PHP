<?php 
include('index.html');
session_start();

if(!isset($_POST['invia'])){
    Ordina();
}else{
    Erogazione();
}

function Erogazione(){
    $utente=$_POST['utente'];
    $indirizzo=$_POST['indirizzo'];
    $num=$_POST['quantita'];
    $appellitivo=$_POST['Cliente'];
    echo"
    Egr.". $appellitivo ." ". $utente ."<br>"; 
    echo"Grazie per la sua prenotazione";
    FINE;
}

function Ordina(){    //con questa funzione invio un ordine
    $listino=$_SESSION['listino'];
 echo<<<FINE
        <div class="card-body">
        <div class="form-group">
        <form action="ordina.php" method="POST">
        <label for="utente">Nome e Cognome</label>
        <input type="text" class="form-control" name="utente" placeholder="Mario Rossi">
        </div>
        <div class="form-group">
        <label for="indirizzo">Indirizzo</label>
        <input type="password" class="form-control" name="indirizzo" placeholder="Via Roma,15-Acquaviva">
        </div>
        <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Cliente" value="Signor">
        <label class="form-check-label" for="Cliente">Signor</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="Cliente" value="Signora">
        <label class="form-check-label" for="Cliente">Signora</label>
        </div>
        </div><br>
        <div class="container">
        FINE;
        for($i=0;$i<count($listino);$i++){
            echo"
            <div class=\form-check sm-6\">
            <select class=\"form-select\">
            <option selected>Menu'</option>";
            foreach($listino as $product=>$price){
                echo"<option value=\"Prodotto $i \">$product(£ $price)</option>";
            }
            echo<<<SELECT
            </select>
            </div>
            <div class="form-check sm-6">
            <label for="quantita" style="color:blue;">Quantità</label>
            <input type="number" name="quantita[]" class="form-control" >
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

