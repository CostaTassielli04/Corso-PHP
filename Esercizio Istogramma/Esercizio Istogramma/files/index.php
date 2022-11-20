<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS Bar Graph</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"><link rel="stylesheet" href="./style.css">

</head>
<body>
  <?php
  if(!isset($_POST['invio']))
{
  InserimentoDati();
}  else{
  Istogramma();
}
 function Barre($preferenze){
  $vett=array('l','m','n','o','p',);
  for($i=0;$i<5;$i++){
    if($preferenze[$i]<=125){
      $vett[$i]='level-1';
    }else if($preferenze[$i]<=250 && $preferenze[$i]>125){
      $vett[$i]='level-2';
    }else if($preferenze[$i]<=375 && $preferenze[$i]>250){
      $vett[$i]='level-3';
    }else{
      $vett[$i]='level-4';
    }
  }
  return $vett;
 }
function Istogramma(){
    $preferenze=$_POST['voto'];
    $barre=Barre($preferenze,);    
    echo"
      <div>
        <b>Legenda per l'istogramma:</b><br>
        <ul>
        <li>level-1: va da 0 a 125(compreso)</li>
        <li>level-2: va da 126 a 250(compreso)</li>
        <li>level-3: va da 251 a 375(compreso)</li>
        <li>level-4: va da 376 a 500(compreso)</li>
        </ul>
      </div>
            <!-- partial:index.partial.html -->
        <section class=\"skills\">

          <div class=\"skills-wrapper\">
        <!--     <div class=\"skill-meters\"></div>
              <div class=\"fe-meter\"></div>
              <div class=\"be-meter\"></div>
            </div> -->
            <div class=\"bar-graph_container\">
              <div class=\"bar-graph_levels\">
                <span class=\"bar-graph_level\">Level 4</span>
                <span class=\"bar-graph_level\">Level 3</span>
                <span class=\"bar-graph_level\">Level 2</span>
                <span class=\"bar-graph_level\">Level 1</span>
              </div>
              <div class=\"bar-graph_bars\">
                <div class=\"bar-graph_bar pink \" id=".$barre[0]."><div class=\"tooltip\" >Tooltip info goes in here buddy.</div></div>
                <div class=\"bar-graph_bar orange\" id=".$barre[1]."><div class=\"tooltip\" >Tooltip info goes in here buddy.</div></div>
                <div class=\"bar-graph_bar green \" id=".$barre[2]."><div class=\"tooltip\" >Tooltip info goes in here buddy.</div></div>
                <div class=\"bar-graph_bar blue \" id=".$barre[3]."><div class=\"tooltip\" >Tooltip info goes in here buddy.</div></div>
                <div class=\"bar-graph_bar yellow \" id=".$barre[4]."><div class=\"tooltip\" >Tooltip info goes in here buddy.</div></div>
              </div>
              <div class=\"bar-graph_items\">
              <span class=\"bar-graph_item\">Item 1</span>
              <span class=\"bar-graph_item\">Item 2</span>
              <span class=\"bar-graph_item\">Item 3</span>
              <span class=\"bar-graph_item\">Item 4</span>
              <span class=\"bar-graph_item\">Item 5</span>
              </div>
            </div>
          </div>
        </section>
        <!-- partial -->
        <hr>
        <table width=\"500\" border=\"2%\">
        <tr>
        <th width=\"50%\">Luogo</th>
        <th width=\"50%\">Preferenze</th>
        </tr>
        <tr>
        <td>Centro commerciale</td>
        <td>".$preferenze[0]."</td>
        </tr>
        <tr>
        <td>Supermercato</td>
        <td>".$preferenze[1]."</td>
        </tr>
        <tr>
        <td>Mercato</td>
        <td>".$preferenze[2]."</td>
        </tr>
        <tr>
        <td>Internet</td>
        <td>".$preferenze[3]."</td>
        </tr>
        <tr>
        <td>Nessun posto in particolare</td>
        <td>".$preferenze[4]."</td>
        </tr>
        </table>";
  }

  function InserimentoDati(){
    echo<<<FINE
    <h3>Preferenze riguardo ai luoghi nei quali fare acquisti</h3>
    <form action="index.php" method="post">
    Centro commerciale: <input type="number" max="500" min="0" name="voto[]" required><br>
    Supermercato: <input type="number" max="500" min="0" name="voto[]" required><br>
    Mercato: <input type="number" max="500" min="0" name="voto[]" required><br>
    Internet: <input type="number" max="500" min="0" name="voto[]" required><br>
    Nessun posto in particolare: <input type="number" max="500" min="0" name="voto[]" required><br>
    <input type="submit" name="invio" value="Invia dati"><br>
    <input type="reset" name="annulla" value="Cancella dati">
    </form>
    FINE;
  }
  ?>
</body>
</html>
