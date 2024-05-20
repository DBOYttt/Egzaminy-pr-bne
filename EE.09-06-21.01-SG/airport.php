<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Odloty Samolotów</title>
</head>
<body>
    <header>
        <div id="baner_1">
            <h2>Odloty z lotniska</h2>
        </div>
        <div id="baner_2">
            <img src="zad6.png" alt="logotyp">
    </header>

    <main>
        <h4>Tabela odlotów</h4>
        <table style="border-collapse: collapse;">
            <tr>
            <th style="border: 1px solid black;">id</th>
            <th style="border: 1px solid black;">numer rejsu</th>
            <th style="border: 1px solid black;">czas</th>
            <th style="border: 1px solid black;">kierunek</th>
            <th style="border: 1px solid black;">status</th>
            <?php
                $polaczenie = mysqli_connect('localhost','root','','egzamin');
                $query = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty";
                $result = mysqli_query($polaczenie, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='border: 1px solid black;'>" . $row['id'] . "</td>";
                    echo "<td style='border: 1px solid black;'>" . $row['nr_rejsu'] . "</td>";
                    echo "<td style='border: 1px solid black;'>" . $row['czas'] . "</td>";
                    echo "<td style='border: 1px solid black;'>" . $row['kierunek'] . "</td>";
                    echo "<td style='border: 1px solid black;'>" . $row['status_lotu'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($polaczenie);

            ?>
            </tr>
        </table>
    </main>

    <footer>
        <div id="stopka_1">
            <a href="kwerendy\kw1.png" target="_blank">Pobierz obraz</a>
        </div>
        <div id="stopka_2">
                <?php
                    if(isset($_COOKIE['visited'])) {
                        echo "<p><strong>Miło nam, że nas znowu odwiedziłeś</strong></p>";
                    } else {
                        setcookie('visited', true, time() + 3600);
                        echo "<p><em>Dzień dobry! Sprawdź regulamin naszej strony</em></p>";
                    }

                ?>
        </div>
        <div id="stopka_3">
            <p>Stronę wykonał: DBOYttt</p>
        </div>
    <footer>
</body>
</html>