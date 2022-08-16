<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatrice</title>
</head>
<body>
    <?php

        if(!isset($_POST['invia'])){
            Digita();
        }else{
            Risultato();
        }


        function Digita(){
            echo<<<FINE
            <form action="calcolatrice.php" method="POST">
            <label for="operazione">Operazioni da effettuare:</label><br>
            <input type="radio" name="operazione" value="Somma">+ Somma<br>
            <input type="radio" name="operazione" value="Differenza">- Differenza<br>
            <input type="radio" name="operazione" value="Prodotto">* Prodotto<br>
            <input type="radio" name="operazione" value="Quoziente">: Quoziente<br>

            <label for="operando1">Operando 1: </label>
            <input type="number" name="operando1"><br>

            <label for="operando2">Operando 2: </label>
            <input type="number" name="operando2"><br>

            <input type="submit" name="invia" value="Invia"><br>
            <input type="reset" name="annulla" value="Cancella dati">
            </form>
            FINE;
        } 

        function Risultato(){
            $n1=$_POST['operando1'];
            $n2=$_POST['operando2'];
            $operazione=$_POST['operazione'];
            switch($operazione){
                case 'Somma':
                    $ris=$n1+$n2;
                    echo "<b>La somma tra $n1 e $n2: $ris</b>";
                    break;
                case 'Differenza':
                    $ris=$n1-$n2;
                    echo "<b>La differenza tra $n1 e $n2: $ris</b>";
                    break;
                case 'Prodotto':
                    $ris=$n1*$n2;
                    echo "<b>Il prodotto tra $n1 e $n2: $ris</b>";
                    break;
                default:
                    $ris=$n1/$n2;
                    echo "<b>Il quoziente tra $n1 e $n2: $ris</b>";
                    break;
            }
        }
    ?>
</body>
</html>