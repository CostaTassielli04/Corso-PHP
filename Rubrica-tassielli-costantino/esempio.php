<?php
session_start();
?>

<html>
    <head>
        <title> Rubrica </title>
    </head>
    <body>

        <?php
        if (!isset($_SESSION['cartoons'])) {
            $rubrica = array();
        } else {
            $_SESSION["contatti"] = $rubrica;
        }

        if (!isset($_POST['invia'])) {
            Carica();
        } elseif ($_POST['invia'] == "Carica") {
            $cartoni[] = $_POST["eroe"];
            Carica();
        } else {
            Rubrica();
            Carica();
        }

        function Carica() {
            echo <<< FINE
            <div class="card-body" style="text-align:center;">
                        <b>Inserisci un nuovo contatto</b>
                        <form action="esempio.php" method="POST" class="login">
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
FINE;
        }
           
            echo "<pre>";
            print_r($cartoni);
            echo "</pre>";
        


        function Rubrica() {?>
            <table class="table table-success table-striped"><tr> 
                <?php $contatti=$_SESSION['contatti'];?>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Città</th>
                    <th>Indirizzo</th>
                    </tr>
                        <?php foreach ($contatti as $record){?>
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