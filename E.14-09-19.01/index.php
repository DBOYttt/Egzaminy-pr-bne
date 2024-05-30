<?php
    $conn = new mysqli('localhost', 'root', '', 'baza');
    if ($conn->connect_error) {
        die("Błąd połączenia z Bazą" . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane o Zwierzętach</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>Atlas Zwierząt</h1>
    </header>

    <main>
        <div>
        <h2>Gromady</h2>
        <ol>
            <li>Ryby</li>
            <li>Płazy</li>
            <li>Gady</li>
            <li>Ptaki</li>
            <li>Ssaki</li>
        </ol>
        <form action="index.php" method="post">
            <label for="wybgrom">Wybierz Gromade</label>
            <input type="number" name="number" id="number" min="1" max="5">
            <input type="submit" value="Wyświetl">
        </form>
        </div>
        <section>
            <aside>
                <img src="zwierzeta.jpg" alt="dzikie zwierzęta">
            </aside>
            <article>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $_id = $_POST['number'];
                        $query = "SELECT nazwa FROM gromady WHERE id = $_id;";
                        $result = $conn->query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<h2>' . $row['nazwa'] . '</h2>';
                        }
                        $query = "SELECT gatunek, wystepowanie FROM zwierzeta WHERE zwierzeta.Gromady_id = $_id;";
                        $result = $conn->query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['gatunek'];
                            echo '<br>';
                            echo $row['wystepowanie'];
                        }
                    }
                ?>
            </article>
            <aside>
                <h2>Wszystkie zwierzeta w bazie</h2>
                <?php
                    $query = "SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta, gromady WHERE zwierzeta.Gromady_id = gromady.id;";
                    $result = $conn->query($query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['id'] . '. ' . $row['gatunek'] .  $row['nazwa'] . '<br>' ;
                    }
                    $conn->close()
                ?>
            </aside>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: DBOYttt</p>
    </footer>
</body>

</html>