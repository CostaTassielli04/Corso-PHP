<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavola Pitagorica</title>
</head>
<body>
    <?php
        if(!isset($_POST['invia'])||isset($_POST['again'])){
            Indici();
        }else{
            TavolaPitagorica();
        }
        function Indici(){
            echo<<<FINE
            <form action="pitagorica.php" method="POST">
            <label for="inizio">Primo numero: </label>
            <input type="number" name="start"><br>
            <label for="inizio">Ultimo numero: </label>
            <input type="number" name="end"><br>
            <input type="submit" name="invia" value="Invia"><br>
            <input type="reset" name="annulla" value="Cancella dati">
            </form>
            FINE;
        }

        function TavolaPitagorica(){
            $a=$_POST['start'];
            $b=$_POST['end'];
            echo "<table>";
            
            for($i=$a;$i<=$b;$i++){
                echo"<tr>";
                for($j=$a;$j<=$b;$j++){
                    echo "<td>".$i*$j ."</td>";
                }
                    echo "</tr><br>";
            }    
            echo"</table>";
            echo<<<FINE
            <a href="pitagorica.php" name="again">Nuova Tavola</a>
            FINE;
        }
    ?>
</body>
</html>