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
    $conn= new mysqli ($host, $user, $pass, $db);
    if($conn->connect_error){
         die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
    }
    else{
        $cod_articolo=$_POST['ispeziona'];
        $prezzo_acquisto=$_POST['price'];
        $dettaglio="SELECT * FROM Articoli WHERE CodiceArticolo=$cod_articolo";
        $info=$conn->query($dettaglio);
        $prezzo_iniziale=$info->fetch_assoc();
        $differenza=($prezzo_acquisto/$prezzo_iniziale)*100;
    ?>
    <table class="table table-success table-striped">
                        <tr> 
                        <th>Codice Articolo</th>
                        <th>Descrizione</th>
                        <th>Colore</th>
                        <th>Giacenza</th>
                        <th>Taglia</th>
                        <th>PrezzoListino</th>
                        <th>Collezione</th>
                        <th>Percentuale di differenza</th>
                        </tr>
                        <tr>
       <?php while ($row = $info->fetch_assoc()){
            ?>
        <td ><?php echo $row['CodiceArticolo']?></td>
        <td ><?php echo $row['Descrizione']?></td>
        <td ><?php echo $row['Colore']?></td>
        <td ><?php echo $row['Giacenza']?></td>
        <td ><?php echo $row['Taglia']?></td>
        <td ><?php echo $row['PrezzoListino']?></td>
        <td ><?php echo $row['Collezione']?></td>
        <td ><?php echo $differenza?></td>
    <?php } 

    }
    $conn->close()
    ?>
<form action="vendita.php" method="POST">
        <button type="submit" class="btn btn-success" value="ritorna" name="new_insert">Fai una nuova vendita</button>
</form>