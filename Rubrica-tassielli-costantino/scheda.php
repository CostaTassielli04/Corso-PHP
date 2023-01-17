<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php session_start();
//recupero gli array di record della sessione
$contatti=$_SESSION['rubrica'];?>
<body>
<table class="table table-success table-striped">
                    <tr> 
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    </tr>
                        <?php //con questi due foreach stampo i campi dell'array di record
                        foreach ($contatti as $record){?> 
                            <tr>
                            <?php foreach ($record as $campo) {?>
                                <td><?php echo $campo ?></td>
                            <?php }?> 
                            </tr>  
                            <?php }?>
                            
                </table>
                <a href="carica.php" class="btn btn-outline-primary">Ritorna ad inserire contatti</a>
</body>
</html>