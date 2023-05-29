<?php
    require 'db-connect.php';
    doShow();
    $conn->close();
    
    function doShow(){
        global $conn;
        $product=$_POST['modello'];

        $sql3="SELECT products.productName,products.productLine,products.productDescription,customers.contactFirstName,customers.contactLastName,customers.phone ,COUNT(orders.orderNumber) AS n_ordini_cliente,
        (
            SELECT COUNT(orders.customerNumber) FROM orders
            INNER JOIN orderdetails ON orders.orderNumber=orderdetails.orderNumber
            INNER JOIN products ON products.productCode=orderdetails.productCode
        ) as totale
            FROM customers 
            INNER JOIN orders ON customers.customerNumber=orders.customerNumber
            INNER JOIN orderdetails ON orders.orderNumber=orderdetails.orderNumber
            INNER JOIN products ON products.productCode=orderdetails.productCode
            GROUP BY customers.contactLastName,customers.contactFirstName,customers.customerNumber
            HAVING products.productName='$product'";


         $result3=$conn->query($sql3) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
         echo"<h3>Elenco clienti:</h3>";

         if($result3->num_rows>0){
            $row=$result3->fetch_assoc();
            echo "Modello:<b>".$row['productName']."</b> & Categoria:<b>".$row['productLine']."</b><br>".$row['productDescription'].'<br>';
            echo "<b>Il totale complessivo degli ordini svolti dai clienti : <i>".$row['totale']."</i></b>";
            $result3=$conn->query($sql3) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
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
                <td ><?php echo $record['n_ordini_cliente']?></td>
                </tr>
                <?php
            } 
            echo "</table>";

        }else{
            echo <<<MSG
            Non ci sono risultati per il modello richiesta :(<br>
            MSG;
        }
        echo"<a class=\"btn btn-secondary \" href=\"?option=form\">Come Back</a>";
    }
