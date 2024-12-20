<?php
include 'connessione.php';

// Controllo se l'ID è passato tramite URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query per eliminare il prodotto
    $sql = "DELETE FROM prodotti WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Reindirizza alla home dopo aver rimosso il prodotto
        header("Location: index.html");
        exit();
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
