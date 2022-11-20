 <?php
    if(!isset($_POST['invio']))
    {
      InserimentoDati();
    }  else{
      Areogramma();
    }


    function InserimentoDati(){
    echo<<<fine
    <h4>Compila ed invia il seguente form per aggiornare i dati dell'areogramma</h4><br>
    <form action="GraficoTorta_tassielliCostantino.php" method="post">

    Centro commerciale: <input type="number" max="500" min="0" name="luogo1" required><br>
    Supermercato: <input type="number" max="500" min="0" name="luogo2" required><br>
    Mercato: <input type="number" max="500" min="0" name="luogo3" required><br>
    Internet: <input type="number" max="500" min="0" name="luogo4" required><br>
    Nessun posto in particolare: <input type="number" max="500" min="0" name="luogo5" required><br>
    <br>
    <input type="submit" name="invio" value="Invia dati"><br>
    <input type="reset" name="annulla" value="Cancella dati">
    </form>

    fine;
    }
    function Areogramma(){
        $p1=$_POST['luogo1'];
        $p2=$_POST['luogo2'];
        $p3=$_POST['luogo3'];
        $p4=$_POST['luogo4'];
        $p5=$_POST['luogo5'];
        echo<<<FINE
        <html>

        <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Luoghi', 'Preferenze'],
                        ['Centro commerciale', $p1],
                        ['Supermercato', $p2],
                        ['Mercato', $p3],
                        ['Internet', $p4],
                        ['Nessuna preferenza', $p5]
                    ]);

                    var options = {
                        title: 'Preferenze dei vari luoghi',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>
        </head>

        <body>
            <center><h2>Areogramma</h2>
            <div id="piechart_3d" style="width: 900px; height: 500px;"></div></center>
        </body>

        </html>
        FINE;
    }
    ?>
















    
