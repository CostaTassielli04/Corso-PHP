<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeri Lotto</title>
</head>
<body>
    <?php

    if(!isset($_POST['invia'])){
        GiocaNumeri();
    }else{
        $n=1;
        $giocati=$_POST['numeri'];
        Estrazione($n,$giocati);
    }

    function GiocaNumeri(){ //funzione con la quale gioco 5 numeri
        echo<<<FINE
        <h2>Gioco del Lotto-Una sola ruota di estrazione<br>
        inserisci 5 numeri che vuoi giocare</h2><br>
        <form action="lotto_tassielli.php" method="post">

        <label for="numeri[]">numero 1</label>
        <input type="number" min="1" max="90" step="1" name="numeri[]"><br>

        <label for="numeri[]">numero 2</label>
        <input type="number" min="1" max="90" step="1" name="numeri[]"><br>

        <label for="numeri[]">numero 3</label>
        <input type="number" min="1" max="90" step="1" name="numeri[]"><br>

        <label for="numeri[]">numero 4</label>
        <input type="number" min="1" max="90" step="1" name="numeri[]"><br>

        <label for="numeri[]">numero 5</label>
        <input type="number" min="1" max="90" step="1" name="numeri[]"><br>

        <input type="submit" name="invia" value="Invia dati">
        <input type="reset" name="cancella" value="Cancella dati">
        </form>
        FINE;
    }
   
    function Estrazione($n,$giocati){  //Funzione con la quale faccio le estrazioni e verifico se ho vinto o meno
        if($n<=10){
            $tabella=[];
            $conta=0;
            echo "<strong>Estrazione n° $n </strong>= ";
            for($i=0;$i<10;$i++){
                $tabella[$i]=mt_rand(1,90);
                for($j=0;$j<$i;$j++){
                    while ($tabella[$j]==$tabella[$i]){
                        $tabella[$i]=mt_rand(1,90);
                    }  
                }
            }

            foreach($tabella as $number){
                echo "$number,";
            }

            echo "<br>Numeri giocati-->";
            foreach($giocati as $number1){
                $check=false;
                foreach($tabella as $number2){
                    if($number2==$number1){
                        echo "<b>$number1</b>,";
                        $conta++;
                        $check=true;
                    }
                }
                if($check==false){
                    echo "$number1,";
                }    
            }
            echo"<br><br>";
            if($conta>0){
                echo "<i>Congratulazioni hai vinto...</i><br>Hai indovinato <b>$conta</b> numeri/o<hr>";
            }else{
                echo "Mi spiace non hai vinto!<hr>";
            }
            $n++;
            Estrazione($n,$giocati); //ricorsione fino a 10
        } 
    }
    ?>
</body>
</html>