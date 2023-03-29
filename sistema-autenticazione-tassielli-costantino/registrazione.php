<?php
$host = "localhost";
$user = "5a";
$pass = "dbA1dmin5";
$db = "5a_tassielli-autenticazione";

// connessione al DBMS con il procedimento ad oggetti
$conn= new mysqli ($host, $user, $pass, $db);
if($conn->connect_error){
    die ("<br>Connessione non riuscita " . $conn->connect_error . " " . $conn->connect_errno);
}else{
    doRegister();
    $conn->close();
}

function doRegister(){
    if(!isset($_POST['registra'])){
        Form();
    }else{
        Remember();
    }
}

//con questa funzione mi registro
function Form(){
    echo <<<form
    <h3>Registrazione</h3>
    <div class="col-12"> 
    <form role="form" class="col-xs-12 col-md-4"  method="post">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="firstname" required>
    </div>
    <div class="form-group">
        <label>Cognome</label>
        <input type="text" class="form-control" name="lastname" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="passphrase" required>
    </div>
          <button type="submit" name="registra" class="btn btn-primary">Register</button>
          <button type="reset" name="cancella" class="btn btn-warning">Clear</button>
    </form> 
    form;
}

//con questa funzione inserisco un nuovo record nel database
function Remember(){
    global $conn;

    try{
        $stmt = $conn->prepare("INSERT INTO Users (lastname,firstname,email,passphrase) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss",$lastname,$firstname,$email, $passphrase);
        $lastname=$_POST['lastname'];
        $email=mysqli_real_escape_string($conn, $lastname);
        $firstname=$_POST['firstname'];
        $email=mysqli_real_escape_string($conn, $firstname);
        $email=$_POST['email'];
        $email=mysqli_real_escape_string($conn, $email);
        $passphrase=md5($_POST['passphrase']);
        $passphrase=mysqli_real_escape_string($conn, $passphrase);
        $query="SELECT email FROM Users WHERE email='$email'";
        $result=$conn->query($query);
        if($result->num_rows==0){
            $stmt->execute();
            echo "Registrazione avvenuta con successo!!";
        }else{
            echo "Oh no! Qualcosa è andato storto,riprova a registrarti";
            Form();
        }
        $stmt->close();
    }catch(Exception $e){
        echo 'Qualcosa è andato storto',  $e->getMessage(), "\n";
        Form();
    }
   
}