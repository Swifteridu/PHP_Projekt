<?php
// Datenbankverbindung
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rechnungen_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Abfrage der Rechnungen des aktuellen Monats
$sql = "SELECT * FROM rechnungen WHERE MONTH(datum) = MONTH(CURDATE()) AND YEAR(datum) = YEAR(CURDATE())";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechnungen dieses Monats</title>
</head>
<body>
    <h1>Rechnungen für den Monat <?php echo date('F Y'); ?></h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Kunde</th>
            <th>Betrag</th>
            <th>Datum</th>
            <th>PDF</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['kunde']}</td>
                        <td>{$row['betrag']} EUR</td>
                        <td>{$row['datum']}</td>
                        <td><a href='generate_pdf.php?id={$row['id']}'>PDF Herunterladen</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Keine Rechnungen für diesen Monat gefunden.</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
$conn->close();
?>
