<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <header>
        <aside>
            <img src="zad1.png" alt="hurtownia komputerowa">
        </aside>
        <nav>
            <ol>
                <li>Sprzęt
                    <ul>
                        <li>Procesory</li>
                        <li>Pamięć RAM</li>
                        <li>Monitory</li>
                        <li>Obudowy</li>
                        <li>Karty Graficzne</li>
                        <li>Dyski twarde</li>
                    </ul>
                </li>
                <li>Oprogramowanie</li>
            </ol>
        </nav>
        <form action="sklep.php" method="post">
            <h1>Hurtownia komputerowa</h1>
            <label for="kat">Wybierz kategorie sprzętu</label>
            <input type="number" name="num" id="num " required max="2">
            <input type="submit" value="Sprawdź">
        </form>
    </header>
    <main>
        <h1>Podzespoły we wskazanej kategorii</h1>
        <?php 
            $conn = new mysqli('localhost','root','','sklep');
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tap = $_POST['num'];
                $query = "SELECT nazwa, podzespoly.opis, cena FROM podzespoly INNER JOIN typy ON podzespoly.typy_id = $tap;";
                $result = $conn->query($query);
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['nazwa'] . $row['opis'] . 'CENA: ' . $row['cena'] . '<br>';
                }
            }
            $conn->close();
        ?>
    </main>
    <footer>
        <h3>Hurtownia działa od poniedziałku do soboty w godzinach  
        7<sup>00</sup>-16<sup>00</sup></h3>
        <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
        <p>Partnerzy: </p>
        <a href="http://intel.pl">intel</a><a href="http://amd.pl">AMD</a>
        <p>Strone Wykonał: DBOYttt</p>
    </footer>
</body>
</html>