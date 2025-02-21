<!DOCTYPE html>
<html>
    <head>
        <title>balise bandol</title>
        <meta charset="utf-8">
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-vml.min.js"></script>
        <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" />
        <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/fonts/css/anychart.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="visuel.css">

    </head>    
    <body>    
        <header class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a href="#" class="navbar-brand">
            <img src="image/capi.jpg" alt="capi" class="w-25" />
        </a>
        
        <!-- Bouton hamburger pour mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenu de la navbar -->
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ml-center mr-5"> <!-- Ajout de ml-auto ici -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Donnée</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ADMIN</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Test</a>
                </li>
            </ul>
        </div>
        
    </header>
        <div class="d-flex justify-content-center mt-5" style="height: 50vh; position: relative; left: -500px;">
            <div id="container" class="w-25"></div>
        </div>        
                <script>
                    anychart.data.loadJsonFile("data.php", function (data) {  // init and draw chart
                        var chart = anychart.line(data);
                        chart.title("Top 5 fruits");
                        chart.background().fill("rgb(173, 188, 230)");
                        chart.container("container");
                        chart.draw();

                        // update chart from server every 5 seconds
                        setInterval(function(){
                            // make request to server
                            // to use loadJsonFile function you must include data-adapter.min.js to your page
                            anychart.data.loadJsonFile("data.php", function (data) {
                                chart.data(data);
                            })
                        }, 5000);
                    });
                </script>
            
            <div id="containerM">

            
            </div>
        
        
        
        <script src="js/fontawesome-all.min.js"></script>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        
        
        <footer class="bg-secondary text-white text-center py-3 fixed-bottom">
            <p>&copy; la y faudrais mettre notre projet et nos prénom je pense</p>
        </footer>
    
    
    </body>


</html>