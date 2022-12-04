<?php session_start(); 
    include('index.html');
    echo"<h3>Tabella </h3>";
    $squadre=$_SESSION['competizione'];
    echo"<table class=\"table table-danger table-striped\">
    <thead class=\"table-dark\">
            <tr>
            <th scope=\"col\">Nome</th>
            <th scope=\"col\">Vittorie</th>
            <th scope=\"col\">Sconfitte</th>
            <th scope=\"col\">Pareggi</th>
            <th scope=\"col\">Punti</th>
            </tr>
                </thead>
                <tbody>";
    foreach($squadre as $nome=>$punti){
        echo"<tr>";?>
            <th scope="row"><?php echo $nome?></th>
            <td><?php echo $punti[0]?></td>
            <td><?php echo $punti[1]?></td>
            <td><?php echo $punti[2]?></td>
            <td><?php echo $punti[3]?></td>
      <?php  }
        
       echo" </tr>";
?>
</table>
