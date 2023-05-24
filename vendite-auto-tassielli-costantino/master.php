<?php 
    require 'db-connect.php';
    doList();
    $conn->close();

    function doList(){
        global $conn;
        if(!isset($_POST['invia'])){ //recupero il campo testuale inserito dall'utente
            $query="SELECT customers.customerName,customers.customerSurname,customers.phone,orders.orderDate,orders.requiredDate,orders.shippedDate,orders.status FROM customers
            INNER JOIN customers.customerNumber=orders.customerNumber
            GROUP BY customers.customerNumber
            ORDER BY customers.customerSurname,orders.orderDate";
        }else{
            $valore=$_POST['valore'];
            $query="SELECT customers.customerName,customers.customerSurname,customers.phone,orders.orderDate,orders.requiredDate,orders.shippedDate,orders.status FROM customers
            INNER JOIN customers.customerNumber=orders.customerNumber
            WHERE customers.customerName LIKE '%$valore%' OR customers.customerSurname LIKE '%$valore%' OR orders.orderDate LIKE '%$valore%' OR orders.requiredDate LIKE '%$valore%'
            ORDER BY customers.customerName,orders.orderDate";
        }
        $result=$conn->query($query) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
    
    echo<<<FINE
    <table class="table table-success table-striped">
    <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Phone</th>
        <th>Order Date</th>
        <th>Required Date</th>
        <th>Shipped Date</th>
        <th>Status</th>
    </tr>
    FINE;
     while ($row = $result->fetch_assoc()){?>
    <td ><?php echo $row['customerName']?></td>
    <td ><?php echo $row['customerSurname']?></td>
    <td ><?php echo $row['phone']?></td>
    <td ><?php echo $row['orderDate']?></td>
    <td ><?php echo $row['requiredDate']?></td>
    <td ><?php echo $row['shippedDate']?></td>
    <td ><?php echo $row['status']?></td>

    <?php
} 
    echo "</table>";

}