<?php session_start();
include('index.html'); 
$squadre=$_SESSION['competizione'];

foreach($squadre as $nome=>$punti){
    $classifica[$nome]=$punti[3];
}

array_multisort($classifica);
$classifica=array_reverse($classifica);

echo"<h3>Classifica</h3>";
echo"<table class=\"table table-danger table-striped\">
    <thead class=\"table-dark\">
            <tr>
            <th>Nome</th>
            <th>Vittorie</th>
            <th>Sconfitte</th>
            <th>Pareggi</th>
            <th>Punti</th>
            </tr></thead>";
            
foreach($classifica as$key=>$punteggio){
    echo"<tr>";
    foreach($squadre as $nome=>$punti){
    if($nome==$key){?>
        <th><?php echo $nome?></th>
        <td><?php echo$punti[0]?></td>
        <td><?php echo$punti[1]?></td>
        <td><?php echo$punti[2]?></td>
        <td><?php echo$punteggio?></td>
  <?php  }
    }
   echo" </tr>";
}
echo" </table>"
?>
