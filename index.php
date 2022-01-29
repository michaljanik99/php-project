<?php
session_start();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    header('Location: panel.php');
    exit();
};
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
          <form method="POST" action="logIn.php">
          <b>Login:</b> <input type="text" name="login"><br>
          <b>Hasło:</b> <input type="password" name="password"><br>
          <input type="submit" value="Zaloguj" name="logIn">
          </form>
          <a href="signIn.php">Zarjestruj się</a>
          <?php
          if(isset($_SESSION['error_1']) && $_SESSION['error_1']==true){
             echo "Bedne hasło";
          };
          if(isset($_SESSION['error_2']) && $_SESSION['error_2']==true){
              echo "Urzytkownik nie istnije";
          };
          ?>
      </div>
  </body>
</html>