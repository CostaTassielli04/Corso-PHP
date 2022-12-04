<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessioni</title>
    <style>
        .login,h3{
            text-align: center;
        }
        .col-md-6{
            margin: auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php

    session_start();
    if(!isset($_POST["invia"])&&!isset($_POST["logout"])){
        Registrazione();
    }else if(isset($_POST["invia"])&&!isset($_POST["logout"])){
        if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
            Verifica();
        }else{
            Autenticazione();
        }
    }else if(isset($_POST["logout"])){
        session_unset();
        echo "Le tue credenziali sono state eliminate con successo";
        echo<<<fine
        <form action="sessioni_tassielliCostantino.php" method="POST">
        <div class="form-group">
        <button type="submit" class="btn btn-success">Ritorna alla login</button>
        </div>     
        </form>
        fine;
    }
    
    function form(){
        echo<<<fine
        <form action="sessioni_tassielliCostantino.php" method="POST">
        <div class="form-group">
        <button type="submit" class="btn btn-success">Ritorna alla login</button>
         <button type="submit" name="logout" value="Invia dati" class="btn btn-primary">Clicca qui per il logout</button>
        </div>     
        </form>
        fine;
    }
    function Registrazione(){
        echo<<<FINE
        <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Registrati</h3>
            </div>
        <form action="sessioni_tassielliCostantino.php" method="POST" class="login">
        <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
            </div>
    
        <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <div class="form-group">
        <input type="checkbox" name="record">
        <label for="record">Ricorda le credenziali</label><br>
        </div>

        <div class="card-footer">
                <button type="submit" class="btn btn-info" value="invia" name="invia">Sign in</button>
                <button type="reset" class="btn btn-warning" float-right" value="cancella" name="cancella">Cancel</button>
        </div>
        </div>
        </form>
        </div>
        FINE;
    }
    function Verifica(){
        if(strcmp($_SESSION['username'],$_POST['username'])==0 && strcmp($_SESSION['password'],$_POST['password'])==0){
                echo "Bentornato <b>". $_SESSION['username']."</b> ci sei mancato<br>";
                form();
        }else{
        Registrazione(); 
        echo "<p>Credenziali non corrette!</p>" ;
        }
}
    function Autenticazione(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        //Salvo i dati nella sessione
        $username = $_SESSION['username'];
        echo "Benvenuto $username, hai completato il login<br>";
        echo "Ciao " . $username ."<br>";
        form();
    }
   
    ?>
</body>
</html>