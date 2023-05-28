<?php 
    require 'db-connect.php';
    doList();
    $conn->close();

    function doDate(&$data1,&$data2){
        global $conn;
        $sql1="SELECT MAX(orders.orderDate) as massimo, MIN(orders.orderDate) as minimo FROM orders";
        $massimo=$conn->query($sql1);
        $record=$massimo->fetch_assoc();
        if($data1==''){
            $data1=$record['minimo'];
        }
        if($data2==''){
            $data2=$record['massimo'];
        } 
    }

    function doList(){
        global $conn;
        if(!isset($_POST['invia'])){ //recupero il campo testuale inserito dall'utente
            $valore='';
            $data1='';
            $data2='';
        }else{
            $valore=$_POST['valore'];
            $data1=$_POST['intervallo1'];
            $data2=$_POST['intervallo2'];
        }
        doDate($data1,$data2);
        $query="SELECT customers.contactFirstName,customers.contactLastName,customers.phone,orders.orderDate,orders.requiredDate,orders.shippedDate,orders.status FROM customers
            INNER JOIN orders ON customers.customerNumber=orders.customerNumber
            WHERE (customers.contactFirstName LIKE '%$valore%' OR customers.contactLastName LIKE '%$valore%') 
             AND (orders.orderDate BETWEEN '$data1' AND '$data2')
            ORDER BY customers.contactLastName,orders.orderDate";
        $result=$conn->query($query) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
    
    echo<<<FINE

    <h3>Ordini effettuati :</h3>
    <table class="table table-primary">
    <tr>
        <th>LastName</th>
        <th>FirstName</th>
        <th>Phone</th>
        <th>Order Date</th>
        <th>Required Date</th>
        <th>Shipped Date</th>
        <th>Status</th>
    </tr>
    FINE;
     while ($row = $result->fetch_assoc()){?>
     <tr>
    <td ><?php echo $row['contactLastName']?></td>
    <td ><?php echo $row['contactFirstName']?></td>
    <td ><?php echo $row['phone']?></td>
    <td ><?php echo $row['orderDate']?></td>
    <td ><?php echo $row['requiredDate']?></td>
    <td ><?php echo $row['shippedDate']?></td>
    <td ><?php echo $row['status']?></td>
     </tr>
    <?php
} 
    echo "</table>";

}