<?php
// Paramètres de connexion
$host = "localhost";
$dbname = "anychart_db";
$username = "admin";
$password = "admin";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Récupération des données de la première courbe
    $stmt1 = $pdo->query("SELECT name, value FROM fruits");
    $data1 = $stmt1->fetchAll();

    // Récupération des données de la deuxième courbe
    $stmt2 = $pdo->query("SELECT temperature, temps FROM courbe2");
    $data2 = $stmt2->fetchAll();

    // Récupération des données de la troisième courbe
    $stmt3 = $pdo->query("SELECT tension, heure FROM batterie");
    $data3 = $stmt3->fetchAll();

    // Retourner les données en JSON
    header('Content-Type: application/json');
    echo json_encode([
        "courbe1" => $data1,
        "courbe2" => $data2,
        "courbe3" => $data3
    ]);

} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution des requêtes
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit();
}
?>
