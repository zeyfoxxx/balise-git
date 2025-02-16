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
        <link rel="stylesheet" href="projet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" />

    </head>
    <body>
  
        
    <header class="navbar navbar-expand-md navbar-light mr-auto">
    <a href="#" class="navbar-brand ml-25">
         <img src="image/sofiane.jpg" alt="sofiane" class="w-25" />
     </a>
	 <!-- id nomme les elts a faire disparaitre -->
     <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-content">
         <span class="navbar-toggler-icon"></span>
     </button>
	 <!-- ici id nomme les elements geres par button -->
     <div class="collapse navbar-collapse" id="navbar-content">
     <!--Begin main nav-->
      <nav>
         <ul class="navbar-nav">
           <li class="nav-item">
               <a href="#" class="nav-link active">Accueil</a>
           </li>
           <li class="nav-item">
               <a href="#" class="nav-link">donnée</a>
           </li>
           <li class="nav-item">
               <a href="#" class="nav-link">ADMIN</a>
           </li>
           <li class="nav-item">
               <a href="#" class="nav-link">caca</a>
           </li>
       </ul>
      </nav>
      <!--End main nav-->
      <!--Begin search form-->
      <!--End search form-->
     </div><!--End .navbar-collapse-->
     
  </header>

        <div id="container"></div>
            <script>
                anychart.data.loadJsonFile("data.php", function (data) {  // init and draw chart
                    var chart = anychart.line(data);
                    chart.title("Top 5 fruits");
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
            <header>
                <h1> sofiane</h1>
            </header>
    
    
        </div>
    
    
    
    <script src="js/fontawesome-all.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>