<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio</title>
</head>
<body>
    <?php
    if(!isset($_POST['invia'])){
        Caricamento();
    }else{
        CentroDati();
    }
    function Caricamento(){
        echo<<<FINE
        <form action="preparazione.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" size="15" required><br>
        <label for="nome">Cognome:</label>
        <input type="text" name="cognome" size="15" required><br>
        <label for="nome">Età:</label>
        <input type="number" name="eta" size="15" required><br>

        <select class="form-select" aria-label="Default select example" name="Giocopreferito">
        <option selected>Quale videogioco preferisci?</option>
        <option value="1">Star wars</option>
        <option value="2">Fortnite</option>
        <option value="3">Call of Duty</option>
        </select><br>

        <label for="squadra[]">Scegli le piu' simpatiche:</label><br>
        <input type="checkbox" name="squadra[]" value="Napoli" >Napoli<br>
        <input type="checkbox" name="squadra[]" value="Liverpool" >Liverpool<br>
        <input type="checkbox" name="squadra[]" value="Barcellona" >Barcellona<br>
        <input type="checkbox" name="squadra[]" value="Bayern Monaco" >Bayern Monaco<br>
        <input type="checkbox" name="squadra[]" value="Manchester City" >Manchester City<br>

        <input type="submit" name="invia" value="invia dati" size="15">
        <input type="reset" name="elimina" value="cancella dati" size="15">
        </form>
        FINE;
    }

    function CentroDati(){
        $nome=$_POST['nome'];
        $squadra=$_POST['squadra'];     
        $data=date("H");
        if ($data<15){
            echo "Buongiorno $nome, il tuo gioco preferito è  mentre le squadre/a che tifi :";
            foreach($squadra as $elem){
                echo "<i>$elem</i>";
            }
        } else{
            echo "Buonasera $nome, il tuo gioco preferito è  mentre le squadre/a che tifi :";
            foreach($squadra as $elem){
                echo "<i>$elem</i>";
            }
        }
    }
    ?>
</body>
</html>