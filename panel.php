<?php
session_start();
if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!==true){
    header('Location: index.php');
    exit();
};
require_once('connect.php');
global $serwer;
$dataPasswords = mysqli_query($serwer ,"SELECT * FROM passTable");
$dataCards = mysqli_query($serwer ,"SELECT * FROM cardsTable");
$dataPersonalInfo = mysqli_query($serwer ,"SELECT * FROM PersonalDataTable");
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
    <!-- partial:index.partial.html -->
    <div class="container">
    <div class="bar">
        <h2 class="title_site">Crypton <?= $_SESSION['userId'] ?> </h2>
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
            <button class="btn btn_identify mt-50" style="background-color: #d7d6d6; font-weight: bold;">
                <p class="title_sidebar"><i class="fas fa-sign-out-alt mr-2"></i>Wyloguj</p>
            </button>
            </a>
        </div>
    </div>
    //
    <nav class="add_new1">
        <li class="new">Dodaj</li>
    </nav>
    <aside>
        <?php while($row = mysqli_fetch_array($dataPasswords)) { ?>

        <article class="block-passwords display_no ">
            <ul class="sin_opt">
                <li class="edit">EDIT</li>       
                <li class="deleteProject">Delete</li>
                <li class="save saveajax">SAVE</li>
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
            <ul class="sin_opt">
                <li class="edit">EDIT</li>           
                <li class="deleteProject">Delete</li>
                <li class="save saveajax">SAVE</li>
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
            <ul class="sin_opt">
                <li class="edit">EDIT</li>           
                <li class="deleteProject">Delete</li>
                <li class="save saveajax">SAVE</li>
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
            <label> Dodaj

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

</html>