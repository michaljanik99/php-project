<?php
$serwer = mysqli_connect("localhost", "root", "") or exit("Nie mozna połączyć się z serwerem bazy danych");
$baza = mysqli_select_db($serwer, "passmanager") or exit ("Nie mozna połączyć się z bazą 'logowanie'");
mysqli_set_charset($serwer, "utf-8");