<?php
session_start();
if (!isset($_POST['login']) || !isset($_POST['password']))
{
    header('Location: index.php');
    exit();
}
    require_once('connect.php');
    global $serwer;
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    if(mysqli_num_rows(mysqli_query($serwer, "SELECT  `login` FROM `users` WHERE login='$login'")))
    {
        $data = mysqli_query($serwer, "SELECT `id`,`login`,`email` FROM `users` WHERE login='$login' AND password='$password'");
        if(mysqli_num_rows($data))
        {
            $data = mysqli_fetch_assoc($data);
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $data['login'];
            $_SESSION['userId'] = $data['id'];
            unset($_SESSION['error_1']);
            unset($_SESSION['error_2']);
            header('Location: panel.php');
        }
        else
        {
            //if wrong password
            $_SESSION['error_1']=true;
            header('Location: index.php');

        }
    }
    else
    {
        //if the user does not exist
        $_SESSION['error_2']=true;
        header('Location: index.php');

    }

