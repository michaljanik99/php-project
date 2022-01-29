<?php
session_start();
require_once('connect.php');
global $serwer,$baza;
if (isset($_POST['loguj']))
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $dane = mysqli_query($serwer, "SELECT * FROM `users` WHERE login='$login' AND password='$haslo'");
    if (mysqli_num_rows($dane))
    {
        echo "loggedin";
        $_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $login;
    }
    else echo "Wpisano złe dane.";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Hello, world!</title>
  </head>
  <body>
  <main>
  <h1 class="visually-hidden">Logowanie</h1>
      <br><div style="display: flex;align-items: center; flex-direction: column">
          <form method="POST" action="">
          <b>Login:</b> <input type="text" name="login"><br>
          <b>Hasło:</b> <input type="password" name="haslo"><br>
          <input type="submit" value="Zaloguj" name="loguj">
          </form>
          <a href="signIn.php">Zarjestruj się</a>
      </div>
  </body>
</html>