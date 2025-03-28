<!DOCTYPE html>
<html>
    <head>
        <!-- rajout de toute les bibliothèque -->
        <title>balise bandol</title> <!-- titre de la page -->
        <meta charset="utf-8"> <!-- encodage de la page en utf8 -->
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script><!-- bibliothèque pour anychart -->
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script><!-- bibliothèque pour anychart -->
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script><!-- bibliothèque pour anychart -->
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-vml.min.js"></script><!-- bibliothèque pour anychart -->
        <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" /><!-- bibliothèque pour anychart -->
        <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/fonts/css/anychart.min.css"/><!-- bibliothèque pour anychart -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- permet de faire le responsive -->
        <link rel="stylesheet" href="css/bootstrap.min.css" /><!-- bibliothèque pour bootstrap 4 -->
        <link rel="stylesheet" href="visuel.css"><!-- laison a mon fichier visuel.css -->

    </head>    
    <body>    
        <header class="navbar navbar-expand-lg navbar-light bg-secondary"><!-- création de la navbar  -->
            <a href="#" class="navbar-brand">
                <img src="image/capi-logo.png" alt="capi" class="w-25" /> <!-- permet de rajouter un logo et de faire un lien clicable  -->
            </a>
            
            <!-- Bouton dépliant pour mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenu de la navbar -->
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav ml-auto mr-5"> <!-- place les bouton a droite et décale légèrement pour la gauche -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Accueil</a><!-- rajout du bouton Acceuil et laison avec le fichier index.php  -->
                    </li>
                    <li class="nav-item">
                        <a href="donnee.php" class="nav-link">Donnée</a><!-- rajout du bouton Donnée et laison avec le fichier donnee.php  -->
                    </li>
                    <li class="nav-item">
                        <a href="news.php" class="nav-link">news</a><!-- rajout du bouton News et laison avec le fichier news.php  -->
                    </li>
                    <li class="nav-item">
                        <a href="credit.php" class="nav-link">CREDIT</a><!-- rajout du bouton CREDIT et laison avec le fichier credit.php  -->
                    </li>
                </ul>
            </div>
        
        </header>

    <div class="container-fluid mt-4"> <!-- création de div pour les courbes  -->
        <div class="row justify-content-center"><!-- place les coubes côtes a côtes en les centrant au milieu  -->
            <div class="col-md-6 col-sm-12 chart-container"><!-- définie la taille de la courbes 1  -->
                <div id="chart1" style="height: 50vh;"></div><!-- définie que cette div marche pour la courbe 1 et laisse un espace de 50vh entre au bord de cette courbe  -->
            </div>
            <div class="col-md-6 col-sm-12 chart-container"><!-- définie la taille de la courbes 2  -->
                <div id="chart2" style="height: 50vh;"></div><!-- définie que cette div marche pour la courbe 2 et laisse un espace de 50vh entre au bord de cette courbe  -->
            </div>
            <div class="col-md-6 col-sm-12 mt-3 chart-container"><!-- définie la taille de la courbes 3  -->
                <div id="chart3" style="height: 50vh;"></div><!-- définie que cette div marche pour la courbe 3 et laisse un espace de 50vh entre au bord de cette courbe  -->
            </div>
        </div>
    </div>


        <script>  //lancement du script pour traiter les données reçu de data.php
        // Charger les données depuis data.php et afficher les graphiques
            anychart.data.loadJsonFile("data.php", function (data) {
                // Vérification des données et affichage dans la console
                console.log("Données reçues :", data);

                // Création du premier graphique (Courbe 1 - Fruits)
                var chart1 = anychart.column();  //création d'un graphique de type anychart en colonne
                var dataSet1 = anychart.data.set(data.courbe1); //création d'un tableau de donnée pour les donnée fruits
                var series1 = chart1.column(dataSet1.mapAs({ x: "name", value: "valeur" })); //création de la courbe en fonction des donnée récupérer et définition des axex x et y

                series1.name("Valeur des Fruits"); //nomme la courbe
                
                chart1.title("pour le moment fruit mais bientot humidité en fonction date"); //titre du graphique
                chart1.xAxis().title("date"); //titre de l'axe x
                chart1.yAxis().title("humidité (%)"); //titre de l'axe y
                chart1.background().fill("rgba(250, 252, 255, 0.99)"); //couleur de fond du graphique en RGBA
                chart1.container("chart1"); //lie le graphique a la div chart1
                chart1.draw(); //affiche le graphique chart1

                // Création du deuxième graphique (Courbe 2 - Température dans le temps)
                var chart2 = anychart.column(); //création d'un graphique de type anychart en colonne
                var dataSet2 = anychart.data.set(data.courbe2);//création d'un tableau de donnée pour les donnée température
                var series2 = chart2.column(dataSet2.mapAs({ x: "temps", value: "temperature" })); //création de la courbe en fonction des donnée récupérer et définition des axex x et y
        
                series2.name("Température"); //nomme la courbe
                chart2.title("Température en fonction de la date"); //titre du graphique
                chart2.xAxis().title("date"); //titre de l'axe x
                chart2.yAxis().title("Température (°C)"); //titre de l'axe y
                chart2.background().fill("rgba(250, 252, 255, 0.99)"); //couleur de fond du graphique en RGBA
                chart2.container("chart2"); //lie le graphique a la div chart2
                chart2.draw(); //affiche le graphique chart2

                var chart3 = anychart.line(); //création d'un graphique de type anychart en ligne
                var dataSet3 = anychart.data.set(data.courbe3);//création d'un tableau de donnée pour les donnée tension
                var series3 = chart3.line(dataSet3.mapAs({ x: "heure", value: "tension" })); //création de la courbe en fonction des donnée récupérer et définition des axex x et y

                series3.name("batterie"); //nomme la courbe
                chart3.title("Tension en foction du temps");//titre du graphique
                chart3.xAxis().title("date(heure)");//titre de l'axe x
                chart3.yAxis().title("tension (V)");//titre de l'axe y
                chart3.background().fill("rgba(250, 252, 255, 0.99)"); //couleur de fond du graphique en RGBA
                chart3.container("chart3"); //lie le graphique a la div chart3
                chart3.draw();//affiche le graphique chart3
                

            
                setInterval(function () { //permet de rafraichir les donnée toute les 5 secondes en utilisant un setInterval
                    anychart.data.loadJsonFile("data.php", function (newData) { //récupère les nouvelle donnée
                        dataSet1.data(newData.courbe1); //met a jour les donnée de la courbe 1
                        dataSet2.data(newData.courbe2); //met a jour les donnée de la courbe 2
                        dataSet3.data(newData.courbe3); //met a jour les donnée de la courbe 3
                    });
                }, 5000); //rafraichit toute les 5 secondes (5000ms)
            });
        </script>
            
        
        <script src="js/fontawesome-all.min.js"></script> <!-- inclusion d'une bibliothèque qui contient le script qui permet de bien afficher des icones     -->
        <script src="js/jquery-3.3.1.slim.min.js"></script><!-- charge Jquery qui est une bibliothèque JavaScript qui permet de faire de bonne animation  -->
        <script src="js/bootstrap.bundle.min.js"></script><!-- fait charger bootstrap 4 (j'ai préférée le remettre pour éviter les bugs) -->
        
        
        <footer class="bg-secondary text-white text-center py-3"> <!-- création du footer de page en définisent sa couleur, la couleur du texte, en mettent le text au centre   -->
            <p>&copy;balise capitainerie bandole BTS CIEL REMPART</p> <!-- première balise text avec en début le logo copyright -->
            <p> Ce site a était réaliser par les étudiants du BTS CIEL Rempart</p>
        </footer> <!-- fin du footer  -->
            
    
    </body>


</html>