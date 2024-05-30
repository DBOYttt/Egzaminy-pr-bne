<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub Wędkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>
    <main>
        <aside>
            <img src="ryba2.jpg" alt="Szczupak">
        </aside>
        <article>
            <h3>Ryby spokojnego żeru (białe)</h3>
            <?php
                $conn = new mysqli('localhost','root','','wedkowanie');
                if ($conn->connect_error) {
                    die("błąd połączenia z bazą danch: " . $conn->connect_error);
                }
                $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;";
                $result = $conn->query($query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<section>';
                    echo $row['id'] . '. ';
                    echo $row['nazwa']. '. ';
                    echo $row['wystepowanie'];
                    echo '</section>';
                }
                $conn->close();
            ?>
            <ol>
                <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź  także</a></li>
                <li><a href="http://www.pzw.org.pl/ " target="_blank">Polski Związek Wędkarski</a></li>
            </ol>
        </article>
    </main>
    <footer>
        <p>Strone wykonał: DBOYttt</p>
    </footer>
</body>
</html>