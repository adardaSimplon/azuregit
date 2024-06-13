<!DOCTYPE html>
<html>
<head>
<title>Afficher une table MariaDB</title>
</head>
<body>

<h1>Mon logo</h1>
<img src="logo.jpg" alt="Logo de mon site">

<?php
// Paramètres de connexion
$host = 'bdd-anna.mysql.database.azure.com';
$username = 'adarda';
$password = 'Simplon2024@';
$database = 'utilisateur';


// Connexion TLS
$db = mysqli_init();
mysqli_ssl_set($db,NULL,NULL, "/var/www/html/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($db, $host, $username, $password, $database, 3306, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

// Vérifier la connexion
if ($db->connect_error) {
    die("La connexion a échoué: " . $db->connect_error);
}


// Sélectionner les données de la table
$query = "SELECT Nom, Prénom, Service FROM personnes";
$result = $db->query($query);

// Vérifier le résultat de la requête
if (!$result) {
    die('Erreur dans la requête (' . $db->errno . ') ' . $db->error);
}

// Afficher les données dans un tableau HTML
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Service</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Prénom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Service']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fermer la connexion à la base de données
$db->close();
?>

</body>
</html>
