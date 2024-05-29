<?php
$conn = new mysqli('localhost','root','','egzamin');
if ($conn->connect_error) {
    die('błąd połączenia' . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <aside>
            <img src="wzor.png" alt="wzór BMI">
        </aside>
        <article>
            <h1>Oblicz swoje BMI</h1>
        </article>
    </header>
    <main>
        <article>
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>wartość maksymalna</th>
                </tr>
                <?php
                    $query = 'SELECT wart_min, wart_max, informacja FROM bmi;';
                    $result = $conn->query($query);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['informacja'].'</td>';
                        echo '<td>'. $row['wart_min'].'</td>';
                        echo '<td>'. $row['wart_max'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </article>
        <aside id="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form action="bmi.php" method="post">
                <label for="waga">waga</label>
                <input type="number" min="1" id="waga" name="waga"><br>
                <label for="wzrost">Wzrost w cm</label>
                <input type="number" min="1" id="wzrost" name="wzrost"><br>
                <input type="submit" value="Oblicz i zapamiętaj wynik">
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if (empty($_POST['waga']) || empty($_POST['wzrost'])) {
                        echo '<p>prosze uzupełnić dane</p>';
                    }
                    else {
                        $waga = $_POST['waga'];
                        $wzrost = $_POST['wzrost'];
                        $wynik = $waga / pow($wzrost, 2);
                        echo '<p>Twoja Waga: '. $waga . '</p>';
                        echo '<p>Twój Wzrost: '. $wzrost . '</p>';
                        echo '<p>Twoje BMI: '. $wynik * 10000 . '</p>';
                        $wynik = strval($wynik * 10000);
                        $var = 0;
                        if($wynik >= 0 && $wynik <= 18) {
                            $var = 1;    
                        }
                        elseif ($wynik >= 19 && $wynik <= 25){
                            $var = 2;
                        }
                        elseif ($wynik >= 26 && $wynik <= 30) {
                            $var = 3;
                        }
                        else {
                            $var = 4;
                        }
                        $data = date('Y-m-d');
                        $query = "INSERT INTO `wynik` (`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES (NULL, $var, '$data', '$wynik');";
                        $conn->query($query);
                        $conn->close();
                    }
                }
                ?>
            </form>
        </aside>
        <aside id="prawy">
                <img src="rys1.png" alt="ćwiczenia">
        </aside>
    </main>
    <footer>
        <p>Autor: DBOYttt</p>
        <a href="Kwerendy.txt">Zobacz Kwerendy</a>
    </footer>
</body>
</html>