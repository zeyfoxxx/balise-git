<?php
// Paramètres de connexion a la bdd
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
    $stmt1 = $pdo->query("SELECT name, value FROM fruits");//récupère toute les données dans la table fruits et les stockent dans stmt1
    $data1 = $stmt1->fetchAll();//rajoute les données récupérer dans stmt1 et les rajoute dans le tableau data1 

    // Récupération des données de la deuxième courbe
    $stmt2 = $pdo->query("SELECT temperature, temps FROM courbe2"); //récupère toute les données dans la table courbe2
    $data2 = $stmt2->fetchAll(); //rajoute les données récupérer dans stmt2 et les rajoute dans le tableau data2

    // Récupération des données de la troisième courbe
    $stmt3 = $pdo->query("SELECT tension, heure FROM batterie");//récupère toute les données dans la table courbe2
    $data3 = $stmt3->fetchAll();//rajoute les données récupérer dans stmt3 et les rajoute dans le tableau data3

    // Retourner les données en JSON
    header('Content-Type: application/json');
    echo json_encode([ //permet d'encoder les 3 tableaux en json et les envoies
        "courbe1" => $data1,
        "courbe2" => $data2,
        "courbe3" => $data3
    ]);

}

catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution des requêtes
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit();
}
?>
