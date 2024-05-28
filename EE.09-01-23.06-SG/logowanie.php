<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum o psach</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <header>
            <h1>Forum wielbicieli psów</h1>
        </header>

        <div class="lewy">
            <img src="obraz.jpg" alt="foksterier">
        </div>

        <div class="prawy1">
            <h2>Zapisz się</h2>
            <form method="post">
                login: <input type="text" name="login" id="login"><br>
                hasło: <input type="password" name="password" id="password"><br>
                powtórz hasło: <input type="password" name="confirm" id="confirm"><br>
                <button type="submit" name="save">Zapisz</button>
            </form>

            <?php
                // Skrypt #1
                $conn = new mysqli("localhost","root","","psy");

                function hashPassword($password) {
                    return sha1($password);
                }
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['confirm'])) {
                        echo '<p>Wypełnij wszystkie pola</p>';
                    }
                    else {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $repeatPassword = $_POST['confirm'];
                
                        if ($password != $repeatPassword) {
                            echo '<p>Hasła nie są takie same, konto nie zostało dodane</p>';
                        }
                        else {
                            $checkLoginQuery = "SELECT * FROM uzytkownicy WHERE login = '$login'";
                            $result = $conn->query($checkLoginQuery);
                
                            if ($result->num_rows > 0) {
                                echo '<p>Login występuje w bazie danych, konto nie zostało dodane</p>';
                            } else {
                                $hashedPassword = hashPassword($password);
                                $addUserQuery = "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$hashedPassword')";
                                if ($conn->query($addUserQuery)) {
                                    echo '<p>Konto zostało dodane</p>';
                                }
                                else {
                                    echo '<p>Błąd dodawania konta do bazy danych</p>';
                                }
                            }
                        }
                    }
                }

                $conn -> close();
            ?>
        </div>

        <div class="prawy2">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>właścicieli psów</li>
                <li>weterynarzy</li>
                <li>tych, co chcą kupić psa</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </div>

        <footer>
            Stronę wykonał: DBOYttt</a>
        </footer>
    </body>
</html>