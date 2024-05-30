<?php
    $conn = new mysqli('localhost','root', '', 'sklep');
    if ($conn->connect_error) {
        die('błąd połączenia z bazą danych' . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <aside>
            <h2>Nasze ceny</h2>
            <table>
                <?php
                    $query = 'SELECT nazwa, cena FROM towary LIMIT 4;';
                    $result = $conn->query($query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo '<td>' .  $row['cena'] .'</td>';
                        echo '<td>' . $row['nazwa'] . '</td>';
                        echo "</tr>";
                    }
                    
                ?>
            </table>
        </aside>
        <article>
            <h2>Koszt zakupów</h2>
            <form action="index.php" method="post">
                <label for="art">Wybierz artykuł: </label>
                <input list="list" name="name" id="name">
                <datalist id="list">
                    <option value="Zeszyt 60 kartek"></option>
                    <option value="Zeszyt 32 kartki"></option>
                    <option value="Cyrkiel"></option>
                    <option value="Linijka 30cm"></option>
                </datalist><br>
                <label for="liczba">liczba sztuk</label>
                <input type="number" min="1" name="liczba" id="liczba"><br>
                <input type="submit" value="Oblicz">
            </form>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $quantity = $_POST['liczba'];
                $query = "SELECT cena FROM towary WHERE nazwa =" ."'" . $name . "';";
                $result = $conn->query($query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $wynik = $row['cena'] * $quantity;
                    echo 'wartość zakupów: ' . $wynik;
                }
                $conn->close();

            }
                
            ?>
        </article>
        <aside>
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia">
            <p>e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
        </aside>
    </main>
    <footer>
            <h4>Witryne wykonał: DBOYttt</h4>
    </footer>
</body>
</html>