<?php
session_start();
include('index.html');
        if(!isset($_POST['invia'])){
            //creo il mio vettore associativo prodotto=>prezzo e lo carico in sessione
            $menu=array();    
            $_SESSION['listino']=$menu;
        }else{
            //recupero il contenuto della sessione e aggiorno il mio menu coi nuovi dati
            $menu=$_SESSION['listino'];
            $name=$_POST['prodotto'];
            $price=$_POST['prezzo'];
            $menu[$name]=$price;
            $_SESSION['listino']=$menu;
            tabella();
        }
        echo<<<FINE
        <div class="card-body" style="text-align:center;">
            <h2>Inserisci il menù</h2>
            <form action="menu.php" method="POST" class="login">
            <div class="form-group">
            <label for="nome">Prodotto:</label>
            <input type="text" name="prodotto" placeholder="Pizza,pane,bevanda,etc..."><br>
            <label for="prezzo">Prezzo:</label>
            <input type="number" name="prezzo" placeholder="£0.00" step="0.10">
            </div><br>
            <div class="card-footer">
            <button type="submit" class="btn btn-success" value="invia" name="invia">Aggiungi Prodotto</button>
            <button type="reset" class="btn btn-warning" float-right" value="cancella" name="cancella">Cancella</button>
            </div>
            </form>
        </div>
        <hr>
        FINE;
        echo "Menù Pizzeria:";

        echo"<pre>";
        print_r($menu);
        echo"</pre>";

        function tabella(){?>
          <table  class="table table-success table-striped">
            <tr>
            <th>Nome</th>
            <th>Prezzo</th></tr>
          <?php  $menu=$_SESSION['listino'];
            foreach($menu as $label=>$price){?>
                <tr>
                <td><?php echo $label?></td>
                <td>£  <?php echo $price?></td>
                </tr>
           <?php }?>
            </table>
        <?php }
    
    ?>
</body>
</html>