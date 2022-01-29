<?php
session_start();
require_once('connect.php');
global $serwer;

if(isset($_POST['cardEdit'])) {
    $nr = key($_POST['cardEdit']);
    $OwnerName = $_POST['OwnerName'];
    $Number = $_POST['Number'];
    $mm = $_POST['mm'];
    $rr = $_POST['rr'];
    $ccv_cvc = $_POST['ccv_cvc'];
    mysqli_query($serwer, "update cardstable set OwnerName='$OwnerName', Number='$Number', Month='$mm', Year='$rr', `CVV/CVC`='$ccv_cvc' where ID='$nr'") or exit("Błąd w zapytaniu: ");
    header("Location:panel.php");
}