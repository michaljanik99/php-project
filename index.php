<?php
session_start();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
    header('Location: panel.php');
    exit();
};
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Mateusz Burnagiel i Michał Janik</title>
    <link rel="stylesheet" href="./style.css?<?=time()?>">
    <link rel="stylesheet" href="./spacing.css?<?=time()?>">
    <script src="https://kit.fontawesome.com/d63cfc9fc7.js" crossorigin="anonymous"></script>
</head>
  <body>
  <div>
      <h2 class="title_site"><i class="fas fa-user-lock fa-4x"></i> </h2>
      <br><div style="display: flex;align-items: center; flex-direction: column">
          <h4> Sejf jest zablokowany. Zaloguj się, aby kontynuować.</h4>
          <form method="POST" action="logIn.php">
              <label class="form_title"><b>Login</b></label>
              <input class="form_input" type="text" name="login"><br>

              <label class="form_title"><b>Hasło</b></label>
              <input class="form_input" type="password" name="password"><br>

              <input class="btn_form btn_login" type="submit" value="Zaloguj" name="logIn">

          </form>
          <a href="signIn.php"><button class="btn_form btn_register" style="width: 230px">Zarjestruj się</button> </a>

              <?php
          if(isset($_SESSION['error_1']) && $_SESSION['error_1']==true){
             echo '<p class="incorect">Błędne hasło </p>';
          };
          if(isset($_SESSION['error_2']) && $_SESSION['error_2']==true){
              echo '<p class="incorect">Użytkownik nie istnieje</p>' ;
          };
          ?>
      </div>
  </body>
</html>