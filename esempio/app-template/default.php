<?php

/* 
 * default.php
 * 
 * Descrivi il contenuto predefinito se non viene scelta alcuna opzione
 */

function doDefault(){
    
echo <<< FINE
    <!-- Main jumbotron per un messaggio di marketing -->
        <div class="jumbotron">
                 <h2>Benvenuto!</h2>
                 <p>In default.php potrai scrivere il contenuto predefinito della tua App<br /></p>
                 <p>Questa App utilizza Bootstrap per approfondimenti...</p>
                 <p>
                    <a class="btn btn-success btn-lg" href="http://getbootstrap.com/" role="button" target="_blank">Boostrap</a>
                    <a class="btn btn-primary btn-lg" href="https://getbootstrap.com/docs/4.4/getting-started/introduction/" role="button" target="_blank">Boostrap Get Start!</a>
                </p>
        </div>
        <pre>
            File e Cartelle contenuti nel template

            app-template (Cartella con tutti i programmi PHP) 
                +--theme
                     +---bootratrap.min.css (Tema https://bootswatch.com/flatly/)
                +--index.php (Layout HTML del sito) 
                      +--main.php (main controller) 
                          +--default.php (pagina di default)
                          +--link1.php
                          +--link2.php
                          +--menu1.php
                          +--menu2.php
                          +--form.php (visualizza ed elabora un form)
        </pre>
FINE;
}

