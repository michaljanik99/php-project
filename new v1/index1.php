<?php
require('connect.php.php');

	// 4. wykonanie zapytania pobierającego dane
    $dataPasswords = mysqli_query($serwer ,"SELECT * FROM passTable");
    $dataCards = mysqli_query($serwer ,"SELECT * FROM cardsTable");
    $dataPersonalInfo = mysqli_query($serwer ,"SELECT * FROM PersonalDataTable");
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mateusz Burnagiel i Michał Jani</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/d63cfc9fc7.js" crossorigin="anonymous"></script>


</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="bar">
        <h2 class="title_site">Crypton</h2>
        <div class="">
            <a href="">
                <p id="favourite" class="title_sidebar"><i class="far fa-star mr-2"></i>Ulubione</p>
            </a>
            <button class="btn_password">
                <p id="password" class="title_sidebar"><i class="fas fa-passport mr-2"></i>Hasła</p>
            </button>
            <button class="btn_card">
                <p id="card" class="title_sidebar"><i class="fas fa-credit-card mr-2"></i>Karta</p>
            </button>
            <button class="btn_identify">
                <p id="identify" class="title_sidebar"><i class="far fa-id-card mr-2"></i>Tozsamość</p>
            </button>
        </div>
    </div>
    <input class="search" type="search" id="search" size="15" placeholder="Szukaj" autocomplete="off">
    <nav class="add_new">
        <li class="new">new</li>
    </nav>
    <aside>
        

        <?php while($row = mysqli_fetch_array($dataPasswords)) { ?>


        <article class="block-passwords ">
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
        <?php }?>

    <?php while($row = mysqli_fetch_array($dataCards)) { ?>
        <article class="block-card ">
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
        <article class="block-personal_data ">
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
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./script.js"></script>
    <!-- <script src="./app.js"></script> -->

</body>

</html>