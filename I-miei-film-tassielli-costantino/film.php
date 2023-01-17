<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<form class="form-inline my-2 my-lg-4">
      <input class="form-control mr-sm-2" type="search" placeholder="Inserisci qui il film da ricercare" aria-label="Search"><br>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="invia">Cerca Film</button>
    </form>
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
        //inizializzo la query e la carico
        $query="SELECT * FROM Film";
        $result=$mysqli->query($query) or die ("<br>Connessione non riuscita " . $mysqli->error . " " . $mysqli->errno);?>
        <table class="table table-success table-striped">
                    <tr> 
                    <th>ID</th>
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
           <td><?php echo $row['id']?></td>
           <td><?php echo $row['nome']?></td>
           <td><?php echo $row['nome_regista']?></td>
           <td><?php echo $row['anno_uscita']?></td>
           <td><?php echo $row['durata']?></td>
           <td><?php echo $row['descrizione']?></td>
           <td><?php echo $row['categoria']?></td></tr>
   <?php }?>
        </table>
        <?php
   }
    $mysqli->close();
    ?>
    
</div>
</body>
</html>