
<?php
// Connexion à MySQL
$MYSQL['host'] = "localhost";
$MYSQL['user'] = "admin";
$MYSQL['password'] = "admin";
$MYSQL['database'] = "anychart_db";

$mysqli = new mysqli($MYSQL['host'], $MYSQL['user'], $MYSQL['password'], $MYSQL['database']);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Récupération des données de la première courbe
$result1 = $mysqli->query("SELECT name, value FROM fruits");
$data1 = array();
while ($row = $result1->fetch_assoc()) {
    $data1[] = array(
        "name" => $row['name'],
        "valeur" => $row['value']
    );
}

// Récupération des données de la deuxième courbe
$result2 = $mysqli->query("SELECT temperature, temps FROM courbe2");
$data2 = array();
while ($row = $result2->fetch_assoc()) {
    $data2[] = array(
        "temperature" => $row['temperature'],
        "temps" => $row['temps']
    );
}

// Fermeture de la connexion
$mysqli->close();

// Retour des données au format JSON
header('Content-Type: application/json');
echo json_encode(array("courbe1" => $data1, "courbe2" => $data2));
?>
