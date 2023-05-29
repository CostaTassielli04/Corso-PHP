<?php
    require 'db-connect.php';
    doForm();
    $conn->close();

    function doForm(){
        if(!isset($_POST['continua'])){
            doModel();
        }else{
            doCategory();
        }
    }

    function doModel(){
        global $conn;
        $sql="SELECT * FROM productlines";
        $result=$conn->query($sql) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
        echo <<< FINE
        <h3>Scegli la categoria del modello che vuoi cercare</h3>
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
        <?php } 
           ?> 
            </select> 
            <br>
        </div> 
        <!--<div class="form-group" id="div1"></div>-->
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="continua" id="continua">Next</button>  
        </form>
                </div>
                <!--<form role="form" class="col-xs-12 col-md-4"  method="post" action="?option=table" id="form1">
                </form>-->
                <?php
    }

    function doCategory(){
        global $conn;
        $categoria=$_POST['categoria'];
        $sql2="SELECT productName,productCode FROM products WHERE productLine='$categoria'";
        $result2=$conn->query($sql2) or die ("<br>Query non riuscita " . $conn->error . " " . $conn->errno);
        /*$products=array();
        while($model=$result2->fetch_assoc()){
            $products[$model['productCode']]=$model['productName'];
        }//con questa funzione passo i parametri da php ad uno script in formato json*/
        echo <<< FINE
        <form role="form" class="col-xs-12 col-md-4" method="post" action="?option=list">
        <div class="form-group">
            <label>Scegli il modello:</label>
            <select  aria-label="Disabled select example" name="modello" id="modello" required>
            <option selected></option>
        FINE;
            while ($product = $result2->fetch_assoc()){
                    ?>
                <option><?php echo $product['productName']?></option>
        <?php } 
           ?> 
            </select> 
            <br>
        </div> 
        <!--<div class="form-group" id="div1"></div>-->
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="vai" id="vai">Go</button>  
        </form><?php
    }?>