<?php
include 'connessione.php';

// Impostiamo l'intestazione per forzare il download come file .txt
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="inventario.txt"');

// Iniziamo a creare il contenuto del file di testo
$output = "Inventario - Report\n";
$output .= "=====================\n";

// Recuperiamo i dati dei prodotti
$sql = "SELECT * FROM prodotti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "Nome: " . $row["nome"] . "\n";
        $output .= "Descrizione: " . $row["descrizione"] . "\n";
        $output .= "Quantità: " . $row["quantita"] . "\n";
        $output .= "Prezzo: " . $row["prezzo"] . "€\n";
        $output .= "---------------------\n";
    }
} else {
    $output .= "Nessun prodotto trovato.\n";
}

// Chiudiamo la connessione
$conn->close();

// Stampa il contenuto e forziamo il download
echo $output;
exit();
?>
