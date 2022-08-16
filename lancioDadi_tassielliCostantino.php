<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lancio dei dadi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    
    <?php

    if(!isset($_POST['invio'])){
        Scelta();
    }else{
        LancioDadi();
    }
    
    function Scelta(){
        echo <<< FINE
        <form action="lancioDadi_tassielliCostantino.php" method="post">
            <h3>Lancio dei dadi</h3><br>
            <label for="number">Inserisci un numero </label>
            <input type="number" name="numero" placeholder="Numero di dadi" size="20">
            <input type="submit" name="invio" value="Invia dati">
        </form>
        FINE;
    }

    function LancioDadi(){
    echo"<h3>Ecco l'esito del tuo lancio:</h3>";
       $n_dadi=$_POST['numero'];
       $somma=0;
       $conta=0;
       $casi=array(
           1=>"<img src=\"dado_1.png\">",
           2=>"<img src=\"dado_2.png\">",
           3=>"<img src=\"dado_3.png\">",
           4=>"<img src=\"dado_4.png\">",
           5=>"<img src=\"dado_5.png\">",
           6=>"<img src=\"dado_6.png\">"
        );
    
        for($i=0;$i<$n_dadi;$i++){
            $estrazione=mt_rand(1,6);
            echo $casi[$estrazione];
            $somma=$somma+$estrazione;
            $conta++;
            if($conta==5){
                echo"<br>";
            }
        }
        echo"<br>Bravo hai ottenuto <i>$somma punti</i> lanciando <b>$n_dadi dadi</b>";
    }
    ?>
</body>
</html>