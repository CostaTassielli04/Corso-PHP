<?php session_start();
include('index.html');

if(!isset($_POST['invia'])){
    $esito=array();
    $_SESSION['competizione']=$esito;
}else{
    $esito=$_SESSION['competizione'];
    $nome=$_POST['squadre'];
    $risultati=$_POST['risultati'];
    $esito[$nome]=$risultati;
    $_SESSION['competizione']=$esito;
}

    echo <<<FINE
    <div class="card-body">
    <form action="carica-squadre.php" method="POST" class="login">
    <div class="form-group">
    <label for="nome">Squadra:</label>
    <input type="text" class="form-control" name="squadre" placeholder="Inserisci squadra" required><br>
    <input type="number" class="form-control" name="risultati[]" placeholder="Num vittorie" required><br>
    <input type="number" class="form-control" name="risultati[]" placeholder="Num pareggi" required><br>
    <input type="number" class="form-control" name="risultati[]" placeholder="Num sconfitte" required><br>
    <input type="number" class="form-control" name="risultati[]" placeholder="Punti totali" required><br>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success" value="invia" name="invia">Aggiungi Squadra</button>
    <button type="reset" class="btn btn-warning" float-right" value="cancella" name="cancella">Cancella</button>
    </div>
    </form>
    </div>
    FINE;

    echo "Squadre partecipanti alla competizione:";

    echo"<pre>";
    print_r($esito);
    echo"</pre>";
   
?>
