<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<h3 style="text-align: center;">I miei film</h3>
    <?php
    // definizione delle variabili
    $host = "localhost";
    $user = "5a";
    $pass = "dbA1dmin5";
    $db = "5a_tassielli-costantino-cinema";

    // connessione al DBMS con il procedimento ad oggetti
    $mysqli= new mysqli ($host, $user, $pass, $db);
    if($mysqli->connect_error){
         die ("<br>Connessione non riuscita " . $mysqli->connect_error . " " . $mysqli->connect_errno);
    }
    else{
        //inizializzo la query e la carico a seconda delle condizioni
        $lista="SELECT DISTINCT categoria FROM Film";
        if(isset($_POST['invia'])){
            $input=$_POST['cerca'];
            if(!isset($_POST['campo'])){ //con questo controllo assegno di default alla mia variabile il valore nome, anche se tale scelta non andrà ad influire sulla mia ricerca, bensi andrà ad insistere solamente sulla sintassi della mia query per evitare errori
                $field='nome';
            }else{                       //altrimenti recupero il valore normale
                $field=$_POST['campo'];
            }
            $categoria=$_POST['categoria'];
            $query="SELECT * FROM Film WHERE $field LIKE '%$input%' AND  categoria LIKE '%$categoria%'";
        }else{
            $query="SELECT * FROM Film";
        }
        //carico la query e la lista di categorie del mio database
        $result=$mysqli->query($query) or die ("<br>Connessione non riuscita " . $mysqli->error . " " . $mysqli->errno);
        $categories=$mysqli->query($lista) or die ("<br>Connessione non riuscita " . $mysqli->error . " " . $mysqli->errno);
        if($result->num_rows>0){
            ?>
            <table class="table table-success table-striped">
                        <tr> 
                        <th>Nome</th>
                        <th>Nome del Regista</th>
                        <th>Anno di uscita</th>
                        <th>Durata</th>
                        <th>Descrizione</th>
                        <th>Categoria</th>
                        </tr>
            <?php
            //con questa funzione recupero il resultato della query e la converto in un array associativo, in modo da stampare i record riga per riga
            while ($row = $result->fetch_assoc()){
                ?>
            <tr>
               <td><?php echo $row['nome']?></td>
               <td><?php echo $row['nome_regista']?></td>
               <td><?php echo $row['anno_uscita']?></td>
               <td><?php echo $row['durata']?></td>
               <td><?php echo $row['descrizione']?></td>
               <td><?php echo $row['categoria']?></td></tr>
       <?php }?>
            </table>
<?php }else{
        echo "<strong >I requisiti desiderati non sono presenti nel database,riprova...</strong>";
        }
   }
    ?>
    <div class="container">
    <div class="row">
    <div class="col sm-6">
        <form class="form-inline my-2 my-lg-4" action="film.php" method="POST">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="campo"  value="nome">
            <label class="form-check-label" for="campo">Titolo</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="campo"  value="nome_regista">
            <label class="form-check-label" for="campo">Regista</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="campo"  value="anno_uscita">
            <label class="form-check-label" for="campo">Anno</label>
        </div>
        <input class="form-control mr-sm-2" type="search" placeholder="Inserisci qui il campo del film da cercare" aria-label="Search" name="cerca"><br>
    </div>

    <div class="col sm-6">
    <b>Scegli categoria</b>
        <select class="form-select" aria-label="Disabled select example" name="categoria">
            <option selected></option>
            <?php
                while ($cat = $categories->fetch_assoc()){
                    ?>
                   <option ><?php echo $cat['categoria']?></option>
           <?php }?>   
        </select><br>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="invia">Cerca Film</button>
    </form>
    </div>

</div>
</div>
</body>
</html>
<?php $mysqli->close();?> 