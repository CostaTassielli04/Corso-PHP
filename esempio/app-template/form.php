<?php

/*
 * form.php
 * 
 * Descrivi il Modulo form
 */

/*
 * Function doForm
 * 
 * Visualizza il form o elabora i dati caricati
 */

function doForm() {
    if (!isset($_POST['invio'])) {
        form();
    } else {
        elabora();
    }
}

/*
 * Function form
 * 
 * Visualizza il form
 */

function form() {
    echo <<< FORM
    <div class="col-12"> 
        <form role="form" class="col-xs-12 col-md-4" action="?option=form" method="post">
           <div class="form-group">
             <label>Come ti chiami?</label>
             <input type="text" class="form-control" name="nome" required>
           </div>

           <div class="form-group">
             <label>Numero 1</label>
             <input type="number" class="form-control" name="num1">
           </div>

           <div class="form-group">
             <label>Numero 2</label>
             <input type="number" class="form-control" name="num2">
           </div>

          <button type="submit" name="invio" class="btn btn-primary">Invia</button>
        </form> 
   </div> 
FORM;
}


/*
 * Function elabora
 * 
 * Elabora i dati inseriti dall'utente nel form
 */

function elabora() {
    //$nome=$_POST['nome'];
    //$num1=$_POST['num1'];
    //$num2=$_POST['num2'];

    $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $num1=filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_INT);
    $num2=filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_INT);

    echo "<h2>Benvenuto $nome</h2>";
    
    $somma=$num1+$num2;
    
    echo "La somma di $num1 e $num2 &egrave; <b>$somma</b>";
    
}