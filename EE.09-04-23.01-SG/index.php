<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizytówki</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Wizytówki pracowników</h1>
        <form action="index.php">
            <input type="number" min="1" max="9" name="id" value="1">
            <input type="submit" value="Wyświetl">
        </form>
        </header>
        <main>
        <?php
            $id = $_GET['id'] ?? 1;
            if (isset($id)) {
                $sql = "SELECT id, imie, nazwisko, adres, miasto FROM pracownicy WHERE id = $id;";
                $conn = new mysqli('localhost', 'root', '', 'firma');
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<section>';
                        echo '<img src="' . $row['id'] . '.jpg" alt="pracownik">';
                        echo '<h2>' . $row['imie'] . ' ' . $row['nazwisko'] . '</h2>';
                        echo '<h4>Adres: ' . $row['adres'] . '</h4>';
                        echo '<p>Miasto: ' . $row['miasto'] . '</p>';
                        echo '</section>';
                    }
                }

            }
        ?>
    </main>
    <footer>
        <aside>
            <img src="obraz.jpg" alt="pracownicy firmy">
        </aside>
        <article>
            <p>Autorem wizytownike jest DBOYttt</p>
            <a href="http://agencjareklamowa543.pl">Zobacz nasze realizacje</a>
        </article>  
        <aside>
            <p>Osoby proszone o podpisanie dokumentu RODO:</p>
            <?php
                $sql = 'SELECT imie, nazwisko FROM pracownicy WHERE czyRODO = 0;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<p>' . $row['imie'] . ' ' . $row['nazwisko'] . '</p>';
                    }
                }
                $conn->close();
            ?>
        </aside>
    </footer>
    
</body>
</html>