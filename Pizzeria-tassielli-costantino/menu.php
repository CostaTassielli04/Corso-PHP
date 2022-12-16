<?php
session_start();
include('index.html');
        if(!isset($_POST['invia'])){
            $menu=array();
            $_SESSION['listino']=$menu;
        }else{
            $menu=$_SESSION['listino'];
            $name=$_POST['prodotto'];
            $price=$_POST['prezzo'];
            $menu[$name]=$price;
            $_SESSION['listino']=$menu;
            tabella();
        }
        echo<<<FINE
        <div class="card-body">
            <form action="menu.php" method="POST" class="login">
            <div class="form-group">
            <label for="nome">Squadra:</label>
            <input type="text" class="form-control" name="prodotto" placeholder="Pizza,pane,bevanda"><br>
            <label for="prezzo">Prodotto:</label>
            <input type="number" name="prezzo" placeholder="$0.00">
            </div>
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

        function tabella(){
            echo"<table>";
            echo"<tr>";
            echo"<th>Nome</th>";
            echo"<th>Prezzo</th></tr>";
            $menu=$_SESSION['listino'];
            foreach($menu as $label=>$price){?>
                <tr>
                <td><?php echo $label?></td>
                <td><?php echo $price?></td>
                </tr>
           <?php }?>
            </table>
        <?php }
    
    ?>
</body>
</html>