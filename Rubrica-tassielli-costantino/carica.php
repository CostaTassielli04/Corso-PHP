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
<body>
<?php
session_start();
if(!isset($_POST['invia'])){
    $rubrica=array();    
    $_SESSION['rubrica']=$rubrica;
}else if($_POST['invia']=="rubrica"){
    Elenco();
}
else{
    $rubrica=$_SESSION['rubrica'];
    $rubrica[]=$_POST["rubrica"];
    $_SESSION['rubrica']=$rubrica;
    SalvaContatti();
}
                echo<<<fine
                <div class="card-body" style="text-align:center;">
                            <b>Inserisci un nuovo contatto</b>
                            <form action="carica.php" method="POST" class="login">
                            <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="rubrica[nome]" placeholder="Luigi"><br>
                            <label for="conome">Cognome:</label>
                            <input type="text" name="rubrica[cognome]" placeholder="Verdi"><br>
                            <label for="tel">Cellulare:</label>
                            <input type="text" name="rubrica[tel]" placeholder="+39 ..." ><br>
                            <label for="nome">E-mail:</label>
                            <input type="text" name="rubrica[mail]" placeholder="luigi.verdi@gmail.com"><br>
                            <label for="conome">Residenza:</label>
                            <input type="text" name="rubrica[residenza]" placeholder="Roma"><br>
                            <label for="tel">Indirizzo:</label>
                            <input type="text" name="rubrica[indirizzo]" placeholder="Via Appia" >
                            </div><br>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-success" value="invia" name="invia">Aggiungi Contatto</button>
                            <button type="submit" class="btn btn-primary" value="rubrica" name="invia">Vai a Lista Contatti</button>
                            <button type="reset" class="btn btn-warning" float-right" value="cancella" name="cancella">Cancella</button>
                            </div>
                            </form>
                        </div>
                fine;

                function SalvaContatti(){
                    global $rubrica;
                    echo"Array di record:";
                    echo"<pre>";
                    print_r($rubrica);
                    echo"</pre>";
                }
            

            function Elenco(){
                global $rubrica;?>
                <table class="table table-success table-striped"><tr> 
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    </tr>
                        <?php foreach ($rubrica as $record){?>
                            <tr>
                            <?php foreach ($record as $campo) {?>
                                <td><?php $campo?></td>
                            <?php }?> 
                            </tr>  
                            <?php }?>
                                
                        <?php } 
                        ?>
                </table>
    </body>
</html>