<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gioco fiammiferi</title>
    <style>
        p,b{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php
        //se non sono stati presi fiammiferi, sul tavolo ce ne sono 11,altrimenti recupero il parametro dell'input type hidden(nascosto)
       if((int)!isset($_POST['tot'])){
            $fiammiferi=11;
        }else{
            $fiammiferi=$_POST['tot'];
        }
        //se non è presente la variabile di invio, richiama la funzione introduttiva altrimenti chiama le altre due e controlla sempre il numero dei fiammiferi
        if(!isset($_POST['invio'])||isset($_POST['invio2'])){
            Presentazione($fiammiferi);
        }
        else {
            echo "<h2>Gioco dei fiammiferi</h2>";
            if($fiammiferi==1){
                Restart("Computer");
            }else{
                $presi=$_POST['n_fiammiferi'];
                $fiammiferi-=$presi;
                if($fiammiferi>1){
                    turno_pc($fiammiferi);
                }else{
                    Restart("Computer");
                }
            }
        }   
        // faccio ricomciare il gioco
        function Restart($name){
            echo"<b>Fine del gioco, $name ha perso :/.</b><u>Ci spiace!</u><br>";
            echo<<<FINE
            <form action="fiammiferi_tassielliCostantino.php" method="POST">
                <input type="submit" name="invio2" value="Gioca ancora">
            </form>
            FINE;
        }
      //permetto all'utente di scegliere quanti fiammiferi prendere dal tavolo
        function turno_utente($fiammiferi,$max){
            echo <<<FINE
            <form action="fiammiferi_tassielliCostantino.php" method="POST">
            <strong>Quanti fiammiferi prendi?</strong>
            <input type="number" name="n_fiammiferi" size="15" placeholder="n°" min="1" max="$max" required><br>
            <input type="hidden" name="tot" value="$fiammiferi"><br>
            <input type="submit" name="invio" value="Invia">
            </form>
            FINE;
            
        }
        // il pc prende un tot di fiammiferi dal tavolo, rispettando un range predefinito
        function turno_pc($fiammiferi){
            if($fiammiferi>3){
                $max=3;
            }else{
                $max=$fiammiferi-1;
            }
            $mossa_pc=mt_rand(1,$max);
            $fiammiferi-=$mossa_pc;
            echo "<p>Computer: Tocca a me! Io prendo $mossa_pc fiammiferi<br>
            Adesso sul tavolo ci sono $fiammiferi fiammiferi</p>";
            for($i=0;$i<$fiammiferi;$i++) {
                echo"<img src=\"fiammifero.jpg\">";
            }
            echo"<br>";
            if($fiammiferi==1){
                Restart("Utente");
            }else{
                if($fiammiferi>3){
                    $max=3;
                }else{
                    $max=$fiammiferi-1;
                }
                turno_utente($fiammiferi,$max);  
            }
        }
        
        function Presentazione($fiammiferi){
            echo "<h2>Gioco dei fiammiferi</h2>";
            echo "<p><b>Regole del gioco:</b>Sul tavolo ci sono 11 fiammiferi.<br> Ogni giocatore, a turno, può prendere 1, 2 o 3 fiammiferi.<br>
            Vince il giocatore che lascia l'ultimo fiammifero sul tavolo<br></p>";
            turno_pc($fiammiferi);
        }
    ?>
</body>
</html>