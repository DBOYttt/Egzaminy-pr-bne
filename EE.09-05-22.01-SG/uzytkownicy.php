<?php
$conn = new mysqli('localhost', 'root', '', 'portal');
if ($conn->connect_error) {
    die('$conn error' . $conn->connect_error);
}
function hashPassword($password) {
    return sha1($password);
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <aside>
            <h2>Nasze osiedle</h2>
        </aside>
        <section>
            <?php
            $query = 'SELECT COUNT(*) AS "liczba wierszy" FROM dane;';
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<p>' . 'Liczba Użytkowników portalu: ' . $row['liczba wierszy'] . '</p>';
                }
            } else {
                echo '<p>błąd zapytania</p>';
            }

            ?>
        </section>
    </header>
    <main>
        <aside>
            <h3>Logowanie</h3>
            <form action="uzytkownicy.php" method="post">
                login: <input type="text" name="login" id="login"><br>
                hasło: <input type="password" name="haslo" id="haslo"><br>
                <input type="submit" value="Zaloguj">
            </form>
        </aside>
        <article>
            <h3>Wizytówka</h3>
            <?php
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $login = $_POST['login'];
                $password = $_POST['haslo'];
                if(empty($_POST['login']) || empty($_POST['haslo'])) {
                    echo '<p>Wypełnij wszystkie pola</p>';
                }
                else {
                    $query = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
                    
                    $result = $conn->query($query);
                    
                    if ($result->num_rows > 0) {
                        
                        $hashedPassword = hashPassword($password);
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($hashedPassword == $row['haslo']) {
                                $query = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy, dane WHERE (dane.id = uzytkownicy.id) AND login = '$login';";
                                $result = $conn->query($query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<section>";
                                    echo "<img src=" . $row['zdjecie'] . " alt='" . $login . "'>";
                                    echo '<h4>'.$row['login'].'</h4>';
                                    $data1 = $row['rok_urodz'];
                                    $data2 = 2024;
                                    echo "wiek:" .  $data2 - $data1;
                                    echo "<p>" . "hobby: " . $row['hobby'] . "</p>";
                                    $przy = $row['przyjaciol'];
                                    for ($i=0;$i<=$przy;$i++ ) {
                                        echo "<img src ='icon-on.png'>";
                                    }
                                    echo "<br>";
                                    echo "<a href= 'dane.html'><button>Więcej informacji...</button></a>";
                                    echo "</section>";
                                }

                            }
                            else {
                                echo '<p>hasło nieprawidłowe</p>';
                            }
                        }
                    }
                    else {
                        echo '<p>Brak użytkownika w bazie dancyh</p>';
                    }
                }

            }
            $conn->close()
                ?>
        </article>
    </main>
    <footer>
            <p>Strone Wykonał DBOYttt</p>
    </footer>
</body>

</html>