<?php
session_start();
unset($_SESSION['loggedIn']);
unset($_SESSION['login']);
unset($_SESSION['userId']);
header('Location: index.php');



