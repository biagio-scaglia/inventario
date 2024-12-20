<?php
include 'connessione.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $quantita = $_POST['quantita'];
    $prezzo = $_POST['prezzo'];

    $sql = "INSERT INTO prodotti (nome, descrizione, quantita, prezzo) 
            VALUES ('$nome', '$descrizione', $quantita, $prezzo)";

    if ($conn->query($sql) === TRUE) {
        echo "Prodotto aggiunto con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
