<?php
session_start();
require_once('connect.php');
global $serwer;

if(isset($_POST['cardEdit'])) {
    $nr = key($_POST['cardEdit']);
    $OwnerName = $_POST['OwnerName'];
    $Number = $_POST['Number'];
    $PaymentCardIssuer = $_POST['PaymentCardIssuer'];
    $mm = $_POST['mm'];
    $rr = $_POST['rr'];
    $Name = $_POST['Name'];
    $ccv_cvc = $_POST['ccv_cvc'];

    if($nr==-1){

       mysqli_query($serwer,"INSERT INTO `cardstable`(`ID`, `OwnerName`, `Number`, `PaymentCardIssuer`, `Month`, `Year`, `CVV/CVC`, `Name`)  VALUES (null,'$OwnerName','$Number','$PaymentCardIssuer','$mm','$rr','$ccv_cvc','$Name')" ) or exit("Błąd w zapytaniu");
    }
    else{
        mysqli_query($serwer, "update cardstable set OwnerName='$OwnerName', Number='$Number', Name='$Name', PaymentCardIssuer='$PaymentCardIssuer', Year='$rr', Month='$mm', `CVV/CVC`='$ccv_cvc' where ID='$nr'") or exit("Błąd w zapytaniu: ");
    }
    header("Location:panel.php");
}
if(isset($_POST['passEdit'])) {
    $nr = key($_POST['passEdit']);
    $name = $_POST['Name'];
    $nick = $_POST['Nick'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $url = $_POST['url'];
    if($nr==-1){

        mysqli_query($serwer,"INSERT INTO `passtable`(`ID`, `Name`, `e-mail`, `Nick`, `Password`, `URL`)  VALUES (null,'$name','$email','$nick','$password','$url')" ) or exit("Błąd w zapytaniu");
    }
    else{
        mysqli_query($serwer, "update passtable set Name='$name', `e-mail`='$email', Nick='$nick', Password='$password', URL='$url' where ID='$nr'") or exit("Błąd w zapytaniu: ");
    }
    header("Location:panel.php");
}
if(isset($_POST['personaldataEdit'])) {
    $nr = key($_POST['personaldataEdit']);
    $Name = $_POST['Name'];
    $SecondName = $_POST['SecondName'];
    $LastName = $_POST['LastName'];
    $PESEL = $_POST['PESEL'];
    $Email = $_POST['E-mail'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Adress = $_POST['Adress'];
    $Postcode = $_POST['Postcode'];
    $City = $_POST['City'];
    $Country = $_POST['Country'];
    if($nr==-1){
        mysqli_query($serwer,"INSERT INTO `personaldatatable`(`ID`, `Name`, `SecondName`, `LastName`, `PESEL`, `e-mail`, `PhoneNumber`, `Adress`, `Postcode`, `City`, `Country`)  VALUES (null,'$name','$email','$nick','$password','$url')") or exit("Błąd w zapytaniu");

    }
    else{
        mysqli_query($serwer, "update personaldatatable set Name='$Name', SecondName='$SecondName', LastName='$LastName', PESEL='$PESEL', `e-mail`='$Email', PhoneNumber='$PhoneNumber', Adress='$Adress', Postcode='$Postcode', City='$City', Country='$Country' where ID='$nr'") or exit("Błąd w zapytaniu: ");
    }
    header("Location:panel.php");
}