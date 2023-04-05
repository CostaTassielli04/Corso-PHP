<?php
    require 'db-connect.php';
    doLogin();
    $conn->close();


function doLogin(){
    if(!isset($_POST['invia'])){
        Authentication();
    }else{
        Verify();
    }
}
  //con questa funzione svolgo il form per il login
function Authentication(){
    echo<<<form
    <h3>Login</h3>
    <div class="col-12"> 
    <form role="form" class="col-xs-12 col-md-4"  method="post">
    <div class="form-group">
             <label>Email</label>
             <input type="email" class="form-control" name="email" required>
           </div>

           <div class="form-group">
             <label>Password</label>
             <input type="password" class="form-control" name="passphrase" required>
           </div>

          <button type="submit" name="invia" class="btn btn-success">Sign in</button>
          <button type="reset" name="cancella" class="btn btn-danger">Clear</button>
        </form> 
    form;
}

//con questa funzione verifico se l'utente che ha inserito le sue credenziali ha già un account
function Verify(){
    global $conn;
    try {
        $email=$_POST['email'];
        $email=mysqli_real_escape_string($conn, $email);
        $passphrase=md5($_POST['passphrase']);
        $passphrase=mysqli_real_escape_string($conn, $passphrase);
        $stmt = $conn->prepare("SELECT lastname,firstname FROM Users WHERE email=? AND passphrase=?");
        $stmt->bind_param("is", $email, $passphrase);

        $stmt->execute();
        $result=$stmt->get_result();

        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            echo "Benvenuto ".$row['lastname']." ".$row['firstname'];
            session_start();
            $_SESSION['email'] = $email;
           // $_SESSION['passphrase'] = $passphrase;

        }else{
            echo 'Credenziali non corrette! <br>Riprova', "\n";
            Authentication();
        }
        $stmt->close();
    } catch (Exception $e) {
        echo 'Qualcosa è andato storto',  $e->getMessage(), "\n";
        Authentication();
    }
    
}