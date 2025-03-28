<?php
/*
 *  permet de se connecter a la base de donnée sur le serveur ionos et d'y ajouter les valeur envoyer par ttn
 */
require 'config.php';

if (WRITE_LOG == true) {
    $machaine = 'entré dans ttnessai';
    file_put_contents('log.txt', $machaine . PHP_EOL, FILE_APPEND); //mouchard qui écris dans les log si des valeurs sont bien reçu par ttnessai
    echo "*************************";
}
;
// Récupérer les données envoyées via POST
$ttn_post = file('php://input');


$data = json_decode($ttn_post[0]); //décode les données reçu en json

if ($data === null) {
    echo "Erreur de décodage JSON";
    file_put_contents('log.txt', "Erreur de décodage JSON: " . $ttn_post[0] . PHP_EOL, FILE_APPEND); //mouchard pour savoir si y a une érreur de décodage
    exit;
}

// Extraire les valeurs utiles du JSON
$sensor_temperature = $data->uplink_message->decoded_payload->temperature; //récupère la température 
$sensor_humidity = $data->uplink_message->decoded_payload->humidity;// récupère l'humidité
$sensor_bat = $data->uplink_message->decoded_payload->bat; //récupère la tension de la batterie
$ttn_time = $data->received_at; //récupère l'heure a la quel ttn envoie les données
$server_time = date("H:i:s"); //récupère l'heure du serveur ionos (serveur Europe)
$sensor = 'DHT11';

;
// affiche l'intégralité des valeur récupérer dans les log
file_put_contents('log.txt', "Température: $sensor_temperature, Humidité: $sensor_humidity, TTN Time: $ttn_time, Server Datetime: $server_datetime" . PHP_EOL, FILE_APPEND);

// Variables de connexion à la base de données
$host_name = 'db5017496193.hosting-data.io';
$database = 'dbs14030897';
$user_name = 'dbu55030';
$password = 'da86Vo$bts';

try {
    // Connexion à la base de données avec méthode PDO
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connexion réussie
    file_put_contents('log.txt', "Connexion à la base de données réussie" . PHP_EOL, FILE_APPEND);

    // Insertion dans la table 'mesures'
    
  $requete = "INSERT INTO mesures (temperature, humidite, nomCapteur) 
                VALUES (:sensor_temperature, :sensor_humidity, :sensor)"; //prépare la requète SQL
    
  	$stmt = $dbh->prepare($requete); //se prépare a envoyer la requète a la base avec la méthode PDO 

  $stmt->bindParam(':sensor_temperature', $sensor_temperature, PDO::PARAM_INT); //lie les valeur récupèrer avec les valeur de la base 
  
  $stmt->bindParam(':sensor_humidity', $sensor_humidity, PDO::PARAM_INT);//lie les valeur récupèrer avec les valeur de la base
    
  $stmt->bindParam(':sensor', $sensor, PDO::PARAM_STR);//lie les valeur récupèrer avec les valeur de la base
 
    
  $requete2 = "INSERT INTO temperature(temperature, temps) 
               VALUES(:sensor_temperature, :sensor_time)";//prépare la requète SQL

  $stmt2 = $dbh->prepare($requete2);//se prépare a envoyer la requète a la base avec la méthode PDO

  $stmt2->bindParam(':sensor_temperature', $sensor_temperature, PDO::PARAM_INT);//lie les valeur récupèrer avec les valeur de la base 

  $stmt2->bindParam(':sensor_time', $server_time, PDO::PARAM_STR);//lie les valeur récupèrer avec les valeur de la base 

  $stmt2->execute();//excécute les l'ensemble des préparation de requète pour stmt2

   
  
    $requete3 = "INSERT INTO batterie(tension, heure) 
               VALUES(:sensor_bat, :sensor_time)";//prépare la requète SQL
 	$stmt3 = $dbh->prepare($requete3);//se prépare a envoyer la requète a la base avec la méthode PDO
  $stmt3->bindParam(':sensor_bat', $sensor_bat, PDO::PARAM_INT);//lie les valeur récupèrer avec les valeur de la base
  $stmt3->bindParam(':sensor_time', $server_time, PDO::PARAM_STR);//lie les valeur récupèrer avec les valeur de la base
  $stmt3->execute();//excécute les l'ensemble des préparation de requète pour stmt3

      $requete4 = "INSERT INTO humiditer(humidite, temps) 
               VALUES(:sensor_humidity, :sensor_time)";//prépare la requète SQL
 	$stmt4 = $dbh->prepare($requete4);//se prépare a envoyer la requète a la base avec la méthode PDO
  $stmt4->bindParam(':sensor_humidity', $sensor_humidity, PDO::PARAM_INT);//lie les valeur récupèrer avec les valeur de la base
  $stmt4->bindParam(':sensor_time', $server_time, PDO::PARAM_STR);//lie les valeur récupèrer avec les valeur de la base
  $stmt4->execute();//excécute les l'ensemble des préparation de requète pour stmt4

  
} catch (PDOException $e) {
    // Log de l'erreur PDO
    file_put_contents('log.txt', "Erreur PDO: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Erreur : " . $e->getMessage();
    exit;
}

// des brut du json reçu depuis ttn
if (WRITE_LOG == true) {
    file_put_contents('log.txt', $ttn_post[0] . PHP_EOL, FILE_APPEND);
}
?>
