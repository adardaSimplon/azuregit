<!DOCTYPE html>
<html>
<head>
<title>Afficher une table MariaDB</title>
</head>
<body>

<h1>Mon logo</h1>
<img src="logo.jpg" alt="Logo de mon site">

<?php
// Connecter à la base de données MariaDB
$db = new mysqli('localhost', '<nom d'utilisateur>', '<mot de passe>', '<nom de la base de données>');

// Sélectionner les données de la table
$query = "SELECT * FROM <nom de la table>";
$result = $db->query($query);

// Afficher les données dans un tableau HTML
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nom'] . "</td>";
    echo "<td>" . $row['prenom'] . "</td>";
    echo "<td>" . $row['adresse'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fermer la connexion à la base de données
$db->close();
?>

</body>
</html>
