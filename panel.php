<?php
session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true){
    header('Location: index.php');
    exit();
};
require_once('connect.php');
global $serwer;
$userId= $_SESSION['userId'];
$dataPasswords = mysqli_query($serwer ,"SELECT * FROM passTable where user_ID = $userId");
$dataCards = mysqli_query($serwer ,"SELECT * FROM cardsTable where user_ID = $userId");
$dataPersonalInfo = mysqli_query($serwer ,"SELECT * FROM PersonalDataTable where user_ID = $userId");
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
    <!-- partial:index.partial.html -->
    <div class="container">
    <div class="bar">
        <h2 class="title_site">Crypton </h2>
        <div class="">
            <button class="btn btn_password">
                <p id="password" class="title_sidebar"><i class="fas fa-passport mr-2"></i>Hasła</p>
            </button>
            <button class=" btn btn_card">
                <p id="card" class="title_sidebar"><i class="fas fa-credit-card mr-2"></i>Karta</p>
            </button>
            <button class="btn btn_identify">
                <p id="identify" class="title_sidebar"><i class="far fa-id-card mr-2"></i>Tozsamość</p>
            </button>
            <a href="logOut.php">
            <button class="btn btn_logout mt-50" style="background-color: #d7d6d6; font-weight: bold;">
                <p class="title_sidebar"><i class="fas fa-sign-out-alt mr-2"></i>Wyloguj</p>
            </button>
            </a>
        </div>
    </div>
    <aside>
        <li class="new block-passwords display_no"><form method="post"><input class="new" type='submit' name='passDelete[0]' value='dodaj'></form></li>
        <li class="new block-cards display_no "><form method="post"><input class="new" type='submit' name='cardDelete[0]' value='dodaj'></form></li>
        <li class="new block-personal_data display_no"><form method="post"><input class="new" type='submit' name='dataDelete[0]' value='dodaj'></form></li>
        <?php
        while($row = mysqli_fetch_array($dataPasswords)) { ?>

        <article class="block-passwords display_no ">
            <nav class="add_new1">
            </nav>
            <ul class="sin_opt">
                <form method="post">
                    <input class="edit" type='submit' name='passDelete[<?=$row['ID']?>]' value='edytuj'>
                    <input class="del" type='submit' name='passDelete[<?=$row['ID']?>]' value='usuń'>
                </form>
            </ul>
            <main ><?=$row['Name']?>
            </main>
            <summary class="_email">
                <a class="remove_summaryDB"></a>
                <section class="title">
                    <span>Nick</span>
                    <span>Email</span>
                    <span>Password</span>
                    <span>URL</span>
                </section>
                <section class="kontenti" tipi="email" subcategory_id="88888">
                    <a class="remove_sectionDB"></a>
                    <span parent="Username"" class=" site"><?=$row['Nick']?></span>
                    <span parent="email" class="username"><?=$row['e-mail']?></span>
                    <span parent="Password" class="username"><?=$row['Password']?></span>
                    <span parent="URL/Site" class="other"><?=$row['URL']?></span>
                </section>
            </summary>
        </article>
        <?php } ?>

    <?php while($row = mysqli_fetch_array($dataCards)) { ?>
        <article class="block-cards display_no ">
            <nav class="add_new1">

            </nav>
            <ul class="sin_opt">
            <form method="post">
                <input class="edit" type='submit' name='cardDelete[<?=$row['ID']?>]' value='edytuj'>
                <input class="del" type='submit' name='cardDelete[<?=$row['ID']?>]' value='usuń'>
            </form>
            </ul>
            <main ><?=$row['Name'] . " / " . $row['PaymentCardIssuer'] ?>
            </main>
            <summary class="_database">
                <a class="remove_summary"></a>
                <section class="title">
                    <span>Właściciel</span>
                    <span>Numer</span>
                    <span>MM/RR</span>
                    <span>CVC/CVV</span>
                </section>
                <section class="kontenti" tipi="database">
                    <a class="remove_section"></a>
                    <span parent="Database Username" class="username"><?=$row['OwnerName']?></span>
                    <span parent="Database Pssword" class="number"><?=$row['Number']?></span>
                    <span parent="Database Host" class="other"><?=$row['Month'] . " / " . $row['Year'] ?></span>
                    <span parent="Database Host" class="other"><?=$row['CVV/CVC']?></span>
                </section>
            </summary>
        </article>
        <?php } ?>


        <?php while($row = mysqli_fetch_array($dataPersonalInfo)) { ?>
        <article class="block-personal_data display_no">
            <nav class="add_new1">

            </nav>
            <ul class="sin_opt">
                <form method="post">
                    <input class="edit" type='submit' name='dataDelete[<?=$row['ID']?>]' value='edytuj'>
                    <input class="del" type='submit' name='dataDelete[<?=$row['ID']?>]' value='usuń'>
                </form>
            </ul>
            <main ><?=$row['Name'] . "  " . $row['SecondName'] . " " . $row['LastName'] ?>
            </main>
            <summary class="_database">
                <a class="remove_summary"></a>
                <section class="title">
                    <span>PESEL</span>
                    <span>E-mail</span>
                    <span>Telefon</span>
                    <span>Adres</span>
                </section>
                <section class="kontenti" tipi="database">
                    <a class="remove_section"></a>
                    <span parent="Database Username" class="username"><?=$row['PESEL']?></span>
                    <span parent="Database Pssword" class="email"><?=$row['e-mail']?></span>
                    <span parent="Database Host" class="other"><?=$row['PhoneNumber']?></span>
                    <span parent="Host Name"
                        class="site"><?=$row['Adress'] . "  " . $row['City'] . " " . $row['Postcode']?></span>
                </section>
            </summary>
        </article>
        <?php } ?>
    </aside>
    </div>

    <form class="form-popup" id="myForm">
        <form action="" class="form-container">
            <label> <h2 style="text-align: center"> Dodaj</h2>

            <select id="select" class="option" name="option">
                <option value=""></option>
                <option value="1">Hasło</option>
                <option value="2">Karta płatnicza</option>
                <option value="3">Dane osobowe</option>
            </select>
            </label>
            <div class="addPassword hide">
                <label class="form_title">Nazwa</label>
                <input type="text" class="form_input">
                <label class="form_title">Nick</label>
                <input type="text" class="form_input">
                <label class="form_title">E-mail</label>
                <input type="email" class="form_input">
                <label class="form_title">Hasło</label>
                <input type="text" class="form_input">
                <label class="form_title">URL</label>
                <input type="text" class="form_input">
            </div>
            <select id="select" class="option" name="option">
                <option value=""></option>
                <option value="1">Hasło</option>
                <option value="2">Karta płatnicza</option>
                <option value="3">Dane osobowe</option>
            </select>
            </label>
            <div class="addPassword hide">
                <label class="form_title">Nazwa</label>
                <input type="text" class="form_input">
                <label class="form_title">Nick</label>
                <input type="text" class="form_input">
                <label class="form_title">E-mail</label>
                <input type="email" class="form_input">
                <label class="form_title">Hasło</label>
                <input type="text" class="form_input">
                <label class="form_title">URL</label>
                <input type="text" class="form_input">
            </div>

            <div class="addCard hide">
                <label class="form_title">Nazwa</label>
                <input type="text" class="form_input">
                <label class="form_title">Wydawca</label>
                <input type="text" class="form_input">
                <label class="form_title">Właściciel</label>
                <input type="text" class="form_input">
                <label class="form_title"Numer</label>
                <input type="number" min="0" class="form_input">
                <label class="form_title">Miesiąc</label>
                <input type="number" min="1" max="12" class="form_input">
                <label class="form_title">Rok</label>
                <input type="number" min="21" max="99" class="form_input">
                <label class="form_title">CVC/CVV</label>
                <input type="number" min="0" max="999" class="form_input">
            </div>
            <div class="addData hide">
                <label class="form_title">Imię</label>
                <input type="text" class="form_input">
                <label class="form_title">Drugie imię</label>
                <input type="text" class="form_input">
                <label class="form_title">Nazwisko</label>
                <input type="text" class="form_input">
                <label class="form_title">PESEL</label>
                <input type="number" class="form_input" min="0">
                <label class="form_title">E-mail</label>
                <input type="email" class="form_input">
                <label class="form_title">Telefon</label>
                <input type="number" class="form_input">
                <label class="form_title">Adres</label>
                <input type="text" class="form_input">
                <label class="form_title">Kod pocztowy</label>
                <input type="number" class="form_input">
                <label class="form_title">Miasto</label>
                <input type="text" class="form_input">
                <label class="form_title">Kraj</label>
                <input type="text" class="form_input">
            </div>



            <button type="button" class="btn btn_add">Dodaj</button>
            <button type="button" class="btn btn_cancel">Anuluj</button>
        </form>
    </form>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./script.js"></script>
    <script src="./app.js"></script>

</body>
<?php
function delete($nr,$table) {
    global $serwer;
    mysqli_query($serwer, "delete from $table where ID=$nr") or exit("Błąd w zapytaniu: ");
    echo '<meta http-equiv="refresh" content="0">';

}
function edit($nr=-1,$table) {
    $popup_edit="<div class='popup_edit'>";
    switch ($table){
        case 'cardstable': $popup_edit.="<form method=POST action='itemsMenage.php'> 
    <label class='form_title'>NAZWA</label> 
	<input class='form_input' type=text name='Name' value='' size=15 style='text-align: left'>
	<label class='form_title'>WYDAWCA</label> 
	<input class='form_input' type=text name='PaymentCardIssuer' value='' size=15 style='text-align: left'>
    <label class='form_title'>WŁAŚCICIEL</label> 
	<input class='form_input' type=text name='OwnerName' value='' size=15 style='text-align: left'>
	<label class='form_title'>NUMER</label> 
	<input class='form_input' type=text name='Number' value='' size=15 style='text-align: left'>
    <label class='form_title'>MM/RR</label> 
    <div>
    <input class='form_input' type=number name='mm' value='' style='width: 40%;'>/<input class='form_input' type=number name='rr' value='' style='width: 40%;'>
    </div>
    <label class='form_title'>CVV/CVC</label> 
	<input class='form_input' type=text name='ccv_cvc' value='' size=15 style='text-align: left'>
	<input class='btn btn_add' type=submit name='cardEdit[$nr]' value='Zastosuj'>
	<a href='panel.php'><input class='btn btn_cancel' type=button value='Anuluj'></a>
</form>";
        break;
        case 'passtable': $popup_edit.="<form method=POST action='itemsMenage.php'>
     <label class='form_title'>NAZWA</label> 
	<input class='form_input' type=text name='Name' value='' size=15 style='text-align: left'> 
    <label class='form_title'>NICK</label> 
	<input class='form_input' type=text name='Nick' value='' size=15 style='text-align: left'>
	<label class='form_title'>EMAIL</label> 
	<input class='form_input' type=email name='email' value='' size=15 style='text-align: left'>
    <label class='form_title'>PASSWORD</label> 
	<input class='form_input' type=password name='password' value='' size=15 style='text-align: left'>
	 <label class='form_title'>URL</label> 
	<input class='form_input' type=text name='url' value='' size=15 style='text-align: left'>
	<input class='btn btn_add' type=submit name='passEdit[$nr]' value='Zastosuj'>
	<a href='panel.php'><input class='btn btn_cancel' type=button value='Anuluj'></a>
</form>";
            break;
        case 'personaldatatable': $popup_edit.="
<form method=POST action='itemsMenage.php'> 
    <label  class='form_title'>IMIĘ</label> 
	<input type=text name='Name' value='' size=15 style='text-align: left'>
	<label class='form_input' class='form_title' >DRUGIE IMIĘ</label> 
	<input type=text name='SecondName' value='' size=15 style='text-align: left'>
	<label class='form_input' class='form_title'>NAZWISKO</label> 
	<input type=text name='LastName' value='' size=15 style='text-align: left'>
	<label class='form_input' class='form_title'>PESEL</label> 
	<input type=text name='PESEL' value='' size=15 style='text-align: left'>
	<label class='form_input' class='form_title'>E-MAIL</label> 
	<input class='form_input' type=email name='E-mail' value='' size=15 style='text-align: left'>
	<label class='form_title'>TELEFON</label> 
	<input class='form_input' type=phone name='PhoneNumber' value='' size=15 style='text-align: left'>
	<label class='form_title'>ADRES</label> 
	<input class='form_input' type=text name='Adress' value='' size=15 style='text-align: left'>
	<label class='form_title'>KOD POCZTOWY</label> 
	<input class='form_input' type=text name='Postcode' value='' size=15 style='text-align: left'>
	<label class='form_title'>MIASTO</label> 
	<input class='form_input' type=text name='City' value='' size=15 style='text-align: left'>
	<label class='form_title'>KRAJ</label> 
	<input class='form_input' type=text name='Country' value='' size=15 style='text-align: left'>
	<input class='btn btn_add' type=submit name='personaldataEdit[$nr]' value='Zastosuj'>
	<a href='panel.php'><input class='btn btn_cancel' type=button value='Anuluj'></a>
</form>";
            break;


    }
    echo $popup_edit."</div>";



}
$command = '';
function makeOperation($command,$nr,$table){
    switch($command) {
        case 'edytuj': edit($nr,$table); break;
        case 'usuń': delete($nr,$table); break;
        case 'dodaj': edit(-1,$table);; break;

    }
}
if(isset($_POST['passDelete'])) {
    $nr = key($_POST['passDelete']);
    $command = $_POST['passDelete'][$nr];
    $table ="passtable";
    makeOperation($command,$nr,$table);
}
if(isset($_POST['cardDelete'])) {
    $nr = key($_POST['cardDelete']);
    echo $nr;
    $command = $_POST['cardDelete'][$nr];
    $table ="cardstable";
    makeOperation($command,$nr,$table);
}

if(isset($_POST['dataDelete'])) {
    $nr = key($_POST['dataDelete']);
    echo $nr;
    $command = $_POST['dataDelete'][$nr];
    $table ="personaldatatable";
    makeOperation($command,$nr,$table);
}



?>
</html>