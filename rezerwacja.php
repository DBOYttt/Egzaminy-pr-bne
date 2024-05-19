<?php
/**
 * Skrypt PHP do obsługi rezerwacji w restauracji.
 *
 * Skrypt ten umożliwia użytkownikom dokonywanie rezerwacji w restauracji poprzez formularz.
 * Dane z formularza są walidowane i zapisywane w bazie danych.
 * Po zapisaniu danych, użytkownik zostaje przekierowany na stronę podziękowania.
 */

// Parametry połączenia z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$database = "baza";

// Utworzenie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $database);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobranie danych z formularza
    $data = mysqli_real_escape_string($conn, $_POST['data']);
    $osoby = mysqli_real_escape_string($conn, $_POST['osoby']);
    $numer = mysqli_real_escape_string($conn, $_POST['telefon']);

    // Wykonanie odpowiednich działań na danych z formularza
    // Na przykład, można je zapisać w bazie danych

    // Zapytanie SQL do wstawienia danych do tabeli
    $sql = "INSERT INTO rezerwacje (id, nr_stolika, data_rez, liczba_osob, telefon) VALUES (NULL, FLOOR(RAND() * 10) + 1, '$data', '$osoby', '$numer');";

    if ($conn->query($sql) === TRUE) {
        // Przekierowanie użytkownika na stronę podziękowania
        header('Location: restauracja.html');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Zamknięcie połączenia z bazą danych
$conn->close();
