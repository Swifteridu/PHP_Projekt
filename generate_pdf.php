<?php
require('fpdf/fpdf.php');

// Datenbankverbindung
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rechnungen_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Rechnung mit der angegebenen ID abrufen
$id = intval($_GET['id']);
$sql = "SELECT * FROM rechnungen WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // PDF erstellen
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0, 10, 'Rechnung ID: ' . $row['id'], 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Kunde: ' . $row['kunde'], 0, 1);
    $pdf->Cell(0, 10, 'Betrag: ' . $row['betrag'] . ' EUR', 0, 1);
    $pdf->Cell(0, 10, 'Datum: ' . $row['datum'], 0, 1);
    $pdf->Ln(10);
    $pdf->MultiCell(0, 10, 'Beschreibung: ' . $row['beschreibung'], 0, 1);

    // PDF an den Browser senden
    $pdf->Output();
} else {
    echo "Rechnung nicht gefunden.";
}

$conn->close();
?>
