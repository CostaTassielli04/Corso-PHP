<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vendite auto</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap core CSS -->
        <link href="theme/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <!-- Barra di navigazione -->
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqLmT59hs9PNrBSEq0vkDP9FWwmTfiM0ATow&usqp=CAU" width="100" height="120"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="?option=home">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="?option=form">Form</a>
                        </li>
                        <form class="form-inline my-2 my-lg-0" method="Post" action="?option=home">
                            <input class="form-control mr-sm-3" type="text" placeholder="inserisci nome,cognome cliente" name="valore">
                            Data inizio:<input class="form-control mr-sm-3" type="date" placeholder="inserisci data inizio ordine..." name="intervallo1" >
                            Data Fine:<input class="form-control mr-sm-3" type="date" placeholder="inserisci data fine ordine..." name="intervallo2">
                            <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="invia">Search</button>
                        </form>
                </div>
            </nav>
        </div>    
        <!-- Fine Barra di navigazione -->

        <div class="container">
            <!-- Contenuto della pagina -->
            <?php include 'controller.php'; ?>
            <hr>
        </div> <!-- /container -->        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS (Bootstrap.bunddle)-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
