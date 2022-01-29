<?php
$serwer = mysqli_connect("localhost", "root", "") or exit("Nie mozna połączyć się z serwerem bazy danych");
$baza = mysqli_select_db($serwer, "passmanager") or exit ("Nie mozna połączyć się z bazą 'logowanie'");
mysqli_set_charset($serwer, "utf-8");
function filtruj($zmienna)
{
    return htmlspecialchars(trim($zmienna));
}

if (isset($_POST['rejestruj']))
{
    $login = filtruj($_POST['login']);
    $haslo1 = filtruj($_POST['haslo1']);
    $haslo2 = filtruj($_POST['haslo2']);
    $email = filtruj($_POST['email']);
    // sprawdzamy czy login nie jest już w bazie
    if(isset($_POST['login']))
    {
        $login = filtruj($_POST['login']);
        $haslo1 = filtruj($_POST['haslo1']);
        $haslo2 = filtruj($_POST['haslo2']);
        $email = filtruj($_POST['email']);
        if($_POST['login'] && $_POST['haslo1'] && $_POST['haslo2'] && $_POST['email'])
        {
            if(!mysqli_num_rows(mysqli_query($serwer, "SELECT  `login` FROM `users` WHERE login='$login'")))
            {
                mysqli_query($serwer, "insert into users (login, password, email) values('$login','$haslo1','$email')") or exit("Przepraszamy, wystąpił nieoczekiwany błąd");
                echo '<p>Pomyślnie zarejestrowano do systemu</p><a href="index.php"  style="color:red; width:100%;display: block;text-align: center;">Przejdź do logowania</a>';
            }
            else
            {
                echo "<p style='color: red'>Użytkownik o podanym loginie istnieje. Prosze wybrac inny</p>";
            }
        }
        else
        {
            echo  "<p style='color: red'>Proszę podać wszystkie dane</p>".$form;
        }
        mysqli_close($serwer);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rejstracja</title>
    <form method="POST" action="">
        <b>Login:</b> <input type="text" name="login"><br><br>
        <b>Hasło:</b> <input type="password" name="haslo1"><br>
        <b>Powtórz hasło:</b> <input type="password" name="haslo2"><br><br>
        <b>Email:</b> <input type="text" name="email"><br>
        <input type="submit" value="Utwórz konto" name="rejestruj">
    </form>
</head>
<body>
<main></main>
</body>
</html>


