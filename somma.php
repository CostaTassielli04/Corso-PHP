<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La mia prima pagina php</title>
</head>
<body>
    <?php
    $n1= $_POST['num1'];
    $n2= $_POST['num2'];
    $somma=$n1+$n2;
    ?>
    <p><?php echo "La somma di $n1 e $n2 è : $somma"; ?></p>
    <a href="somma.html">Torna all'indice</a>
</body>
</html>