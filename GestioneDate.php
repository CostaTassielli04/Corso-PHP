<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione date</title>
</head>
<body>
   <?php
   if(!isset($_POST['invia'])){
       Presentazione();
   }else{
       Saluto();
   }
   function Presentazione(){
       echo <<<FINE
       <form action="GestioneDate.php" method="post">
       <label for="nome">Come ti chiami?</label><br>
       <input type="text" name="nome" size="15" placeholder="Mario Rossi" required><br>
       <input type="submit" name="invia" value="Invia parametro"><br>
       <input type="reset" name="cancella" value="Resetta">
       </form>
       FINE;
   }
   function Saluto(){
       switch(date("l")){
           case "Monday":
                echo <<< FINE
                <body style="background-color:yellow;">
                </body>
                FINE;
                break;
            case "Thursday":
                echo <<< FINE
                 <body style="background-color:pink;">
                 </body>
                FINE;
                break;
            case "Wednesday":
                echo <<< FINE
                <body style="background-color:aqua;">
                </body>
                FINE;
                break;
            case "Tuesday":
              echo <<< FINE
                <body style="background-color:lime;">
                </body>
                FINE;
                break;
            case "Friday":
                echo <<< FINE
                <body style="background-color:olive;">
                </body>
                FINE;
                break;
            case "Saturday":
                echo <<< FINE
                <body style="background-color:silver;">
                </body>
                FINE;
                break;
            default:
                echo <<< FINE
                <body style="background-color:red;">
                </body>
                FINE;
       }
       $nome=$_POST['nome'];
       $ora= date("H");
       $data =date("l jS \of F Y ");
       if($ora<=12){
            $ora= date("H\:i\:s");
           echo "Buon giorno $nome,<br>oggi è $data e sono le $ora";
       }else if($ora<18){
        $ora= date("H\:i\:s");
        echo "Buon pomeriggio $nome,<br>oggi è $data e sono le $ora";
       }else{
        $ora= date("H\:i\:s");
        echo "Buona sera $nome,<br>oggi è $data e sono le $ora";
       }
   }
   ?> 
</body>
</html>