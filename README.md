# Dokumentacja projektu INF.03-01-21.06-SG - Czerwiec 2021

## Struktura projektu

Projekt składa się z następujących plików:

- [`baza.sql`](https://github.com/DBOYttt/Pliki/blob/main/baza.sql): Plik zawierający strukturę bazy danych oraz dane do wypełnienia.
- [`kwerendy/kwerendy1.txt`](https://github.com/DBOYttt/Pliki/blob/main/kwerendy/kwerendy1.txt): Plik zawierający przykładowe kwerendy SQL.
- [`restauracja.html`](https://github.com/DBOYttt/Pliki/blob/main/restauracja.html): Plik HTML zawierający stronę główną restauracji.
- [`rezerwacja.php`](https://github.com/DBOYttt/Pliki/blob/main/rezerwacja.php): Plik PHP obsługujący rezerwacje stolików przez formularz na stronie.
- [`styl_1.css`](https://github.com/DBOYttt/Pliki/blob/main/styl_1.css): Plik CSS zawierający style dla strony głównej restauracji.

## Opis projektu

Projekt jest aplikacją webową dla restauracji, która umożliwia użytkownikom rezerwację stolików online. Użytkownik wprowadza datę, liczbę osób i numer telefonu, a następnie dane są zapisywane w bazie danych.

## Instrukcja obsługi

1. Otwórz stronę główną restauracji [`restauracja.html`](https://github.com/DBOYttt/Pliki/blob/main/restauracja.html) w przeglądarce.
2. Przejdź do sekcji "Zarezerwuj stolik on-line".
3. Wypełnij formularz rezerwacji, wprowadzając datę, liczbę osób i numer telefonu.
4. Zaznacz pole "Zgadzam się na przetwarzanie moich danych osobowych".
5. Kliknij przycisk "Zarezerwuj" aby wysłać formularz.
6. Po pomyślnej rezerwacji, zostaniesz przekierowany z powrotem na stronę główną.

## Wymagania

- Serwer PHP
- Serwer MySQL
- Przeglądarka internetowa

## Instalacja

1. Skopiuj pliki projektu na serwer.
2. Utwórz bazę danych MySQL, używając struktury i danych z pliku [`baza.sql`](https://github.com/DBOYttt/Pliki/blob/main/baza.sql).
3. W pliku [`rezerwacja.php`](https://github.com/DBOYttt/Pliki/blob/main/rezerwacja.php), zmień parametry połączenia z bazą danych na właściwe dla Twojego serwera.
4. Otwórz stronę główną restauracji [`restauracja.html`](https://github.com/DBOYttt/Pliki/blob/main/restauracja.html) w przeglądarce.

## Autor

Projekt został wykonany jako rozwiązanie testu INF.03-01-21.06-SG - Czerwiec 2021 w Polsce.
