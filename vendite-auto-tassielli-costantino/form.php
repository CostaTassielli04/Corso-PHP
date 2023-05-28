<?php
    require 'db-connect.php';
    doForm();
    $conn->close();

    function doForm(){
        if(!isset($_POST['category'])){
            doModel();
        }else{
            doShow();
        }
    }

    function doModel(){
        global $conn;
        $sql="SELECT * FROM productlines";
        $result=$conn->query($sql) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
        echo <<< FINE
        <h3>Scegli la categoria con la quale effettuare la ricerca</h3>
        <div class="col-12"> 
        <form role="form" class="col-xs-12 col-md-4"  method="post">
        <div class="form-group">
            <label>Productline:</label>
            <select  aria-label="Disabled select example" name="categoria" id="categoria" required>
            <option selected></option>
        FINE;
            while ($productline = $result->fetch_assoc()){
                    ?>
                <option><?php echo $productline['productLine']?></option>
            <?php }?>   
            </select><br>
       </div>
       <div class="form-group">
        <div id="bottone"></div>
       </div>   
       </form>
       </div>
    <?php
    }

    function doShow(){
        global $conn;
        $categoria=$_POST['categoria'];
        $sql2="SELECT productName,productCode FROM products WHERE productLine='$categoria'";
        $result2=$conn->query($sql2) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
        $products=array();
        while($model=$result2->fetch_assoc()){
            $products[$model['productCode']]=$model['productName'];
        }
        $json=json_encode($products); //con questa funzione passo i parametri da php ad uno script in formato json
        $product=$_POST['modello'];
        $sql3="SELECT products.productDescription,customers.contactFirstName,customers.contactLastName,customers.phone,COUNT(orders.customersNumber) as n_ordini,SUM(n_ordini) as totale
         FROM customers 
         INNER JOIN orders ON customers.customerNumber=orders.customerNumber
         INNER JOIN orderdetails ON orders.orderNumber=orderdetails.orderNumber
         INNER JOIN products ON products.productCode=orderdetails.productCode
         GROUP BY customers.contactLastName,customers.contactFirstName,customers.customerNumber
         HAVING products.productCode='$product'";
         $result3=$conn->query($sql3) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
         echo"<h3>Elenco clienti:</h3>";
        $row=$result3->fetch_assoc();
        echo $row['productDescription'].'<br>';
        echo "<b>Il totale complessivo degli ordini svolti dai clienti : <i>".$row['totale']."</i></b>";
         echo <<<FINE
         <table class="table table-primary">
         <tr>
             <th>LastName</th>
             <th>FirstName</th>
             <th>Phone</th>
             <th>N° orders</th>
         </tr>
         FINE;
          while ($record = $result3->fetch_assoc()){?>
          <tr>
         <td ><?php echo $record['contactLastName']?></td>
         <td ><?php echo $record['contactFirstName']?></td>
         <td ><?php echo $record['phone']?></td>
         <td ><?php echo $record['n_ordini']?></td>
          </tr>
         <?php
     } 
         echo "</table>";

    }
?>
<script type="text/javascript">
    window.addEventListener("load", () => {
        let select = document.getElementById("categoria");
        select.addEventListener("hover", () => {
            var select2  = document.createElement("select");
            select2.name="modello"
            select2.id="modello"
            var jsonObj= <?=$json?> //recupero il valore della mia variabiel json popolata in php
            for(var i in jsonObj){ //scorro il mio vettore e creo un menù a tendineìa
                var option = document.createElement("option");
                option.setAttribute("value", jsonObj[i]);
                option.text = jsonObj[i];
                select2.appendChild(option);
            }
        var bottone= document.createElement("button"); //creo un pulsante per innescare lo statement da mostrare a video
        bottone.type="submit"
        bottone.name="category"
        bottone.class="btn btn-outline-success"
        bottone.innerHTML="Submit"
    });
});
    
</script>