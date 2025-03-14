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
            <ul class="navbar-nav ml-auto mr-5"> <!-- Ajout de ml-auto ici -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="donnee.php" class="nav-link">Donnée</a>
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

    <div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <!-- Premier graphique -->
        <div class="col-md-6 col-sm-12">
            <div id="chart1" style="width: 100%; height: 50vh;"></div>
        </div>

        <!-- Deuxième graphique -->
        <div class="col-md-6 col-sm-12">
            <div id="chart2" style="width: 100%; height: 50vh;"></div>
        </div>
    </div>
</div>


<script>
    // Charger les données depuis data.php et afficher les graphiques
    anychart.data.loadJsonFile("data.php", function (data) {
        // Vérification des données
        console.log("Données reçues :", data);

        // Création du premier graphique (Courbe 1 - Fruits)
        var chart1 = anychart.column(); 
        var dataSet1 = anychart.data.set(data.courbe1);
        var series1 = chart1.column(dataSet1.mapAs({ x: "name", value: "valeur" }));

        series1.name("Valeur des Fruits");
        chart1.title("pour le moment fruit mais bientot humidité en fonction date");
        chart1.xAxis().title("date");
        chart1.yAxis().title("humidité (%)");
        chart1.background().fill("rgba(250, 252, 255, 0.99)");
        chart1.container("chart1");
        chart1.draw();

        // Création du deuxième graphique (Courbe 2 - Température dans le temps)
        var chart2 = anychart.column(); 
        var dataSet2 = anychart.data.set(data.courbe2);
        var series2 = chart2.column(dataSet2.mapAs({ x: "temps", value: "temperature" }));

        series2.name("Température");
        chart2.title("Température en fonction de la date");
        chart2.xAxis().title("date");
        chart2.yAxis().title("Température (°C)");
        chart2.background().fill("rgba(250, 252, 255, 0.99)");
        chart2.container("chart2");
        chart2.draw();

    
        setInterval(function () {
            anychart.data.loadJsonFile("data.php", function (newData) {
                dataSet1.data(newData.courbe1);
                dataSet2.data(newData.courbe2);
            });
        }, 5000);
    });
</script>
            
            <div id="containerM">

            
            </div>
        
        
        
        <script src="js/fontawesome-all.min.js"></script>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        
        
        <footer class="bg-secondary text-white text-center py-3 fixed-bottom">
            <p>&copy; caca balise capitainerie bandole BTS CIEL REMPART</p>
        </footer>
    
    
    </body>


</html>