<?php
$serwer = mysqli_connect("localhost", "root", "") or exit("Nie mozna połączyć się z serwerem bazy danych");
$baza = mysqli_select_db($serwer, "passmanager") or exit ("Nie mozna połączyć się z bazą 'logowanie'");
mysqli_set_charset($serwer, "utf-8");
function filtruj($zmienna)
{
    return htmlspecialchars(trim($zmienna));
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Mateusz Burnagiel i Michał Janik</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./spacing.css">
    <script src="https://kit.fontawesome.com/d63cfc9fc7.js" crossorigin="anonymous"></script>
</head>
<body>
<div>
    <h2 class="title_site">Crypton </h2>
    <br><div style="display: flex;align-items: center; flex-direction: column">
    <form method="POST" action="">
        <label class="form_title"><b>Login</b></label>
        <input class="form_input" type="text" name="login"><br><br>

        <label class="form_title"><b>Hasło</b></label>
        <input class="form_input" type="password" name="haslo1"><br>

        <label class="form_title"><b>Powtórz hasłó</b></label>
        <input class="form_input" type="password" name="haslo2"><br><br>

        <label class="form_title"><b>E-mail</b></label>
        <input class="form_input" type="text" name="email"><br>

        <input class="btn_form btn_login" type="submit" value="Utwórz konto" name="rejestruj">
    </form>
<?php
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
</div>
</body>
</html>


