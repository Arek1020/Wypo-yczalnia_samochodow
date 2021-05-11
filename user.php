<?php require_once("config_connection.php"); ?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Twoje konto</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #container {
            background-color: white;
            font-family: 'Montserrat', sans-serif;
            
            position: relative;
        }

        #header {
            background: #fbb5b8;
            padding: 10px;
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Wysokość nagłówka */
            background: #b5fbbd;
        }
        table{
            width: 100%;
            margin-top: 5%;
        }
        td{
            width: 15%;
            text-align: center;
            border-bottom: 3px solid grey;
            padding-top: 20px;
        }
        
    </style>
</head>

<body>

    <!-- HEADER -->

    <div class="header">
        <div class="inner_header">
            <div class="logo_container">
                <a href="index.php"><img src=logon.png></a>
            </div>
            <ul class="navigation">
                <?php if (empty($_SESSION['email'])) : ?>
                    <a href="login.php">
                        <li>Zaloguj się</li>
                    </a>
                    <a href="register.php">
                        <li>Zarejestruj się</li>
                    </a>
                    <a href="contact.html">
                        <li>Kontakt</li>
                    </a>
                <?php else :  ?>
                    <a href="logout.php">
                        <li>Witaj, <?php echo $_SESSION['email'] ?></li>
                    </a>
                    <a href="user.php">
                        <li>Twoje wypożyczenia </li>
                    </a>
                <?php endif; ?>


            </ul>
        </div>
    </div>

    <br />

    <!-- CONTAINER -->

    <div id="container">
        <center>
            <div id="user" style="width: 1300px;">
                <a style="font-size: 25px; padding: 20px">Twoje wypożyczenia:</a>

                <?php

                if(empty($_SESSION['id_uzytkownika'])){
                    $_SESSION['wyp_err'] = "Musisz się zalogować przed wypożyczeniem samochodu!";
                    header('Location: login.php');
                }
                else if (isset($_POST['wypozycz'])) {
                    $iledni = $_POST['ileDni'];
                    $wartoscZam = $iledni * $_SESSION['cena_samochodu'];
                    $sth = $db->prepare('insert into wypozyczenia(id_uzytkownika,id_samochodu,ilosc_dni,wartosc_zamowienia,data_zamowienia) 
                        values (:id_uzytkownika, :id_samochodu, :ilosc_dni, :wartosc_zam, :data_zam);');
                    $sth->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);
                    $sth->bindParam(':id_samochodu', $_SESSION['id_samochodu']);
                    $sth->bindParam(':ilosc_dni', $iledni);
                    $sth->bindParam(':wartosc_zam', $wartoscZam);
                    $sth->bindValue(':data_zam', date('Y-m-d'));
                    $sth->execute();

                    
                }


                $sth = $db->prepare('select wypozyczenia.id_samochodu, marka, model, ilosc_dni, wartosc_zamowienia, data_zamowienia from wypozyczenia 
                inner join samochody on wypozyczenia.id_samochodu = samochody.id_samochodu where id_uzytkownika = '.$_SESSION['id_uzytkownika'].' order by wypozyczenia.id_wypozyczenia DESC;');
                $sth->execute();
                echo '<table><tr><td></td><td>Nazwa</td><td>Ile dni</td><td>Wartość zamówienia</td><td>Data zamówienia</td>';
                while($row = $sth->fetch()){

                    echo '<tr>';
                    echo '<td><img src="jpg/imgwyp/'.$row['id_samochodu'].'.png" class="imgCar" /></td>';
                    echo '<td>'.$row['marka'].' '.$row['model'].'</td>';
                    echo '<td>'.$row['ilosc_dni'].'</td>';
                    echo '<td>'.$row['wartosc_zamowienia'].'</td>';
                    echo '<td>'.$row['data_zamowienia'].'</td>';
                    
                   
                    
                    echo '</tr>';
                }
                echo '</table>';
                
                ?>
            </div>
        </center>
    </div>

    <!-- FOOTER -->

    <div class="footer">
        <div class="inner_footer">
            <div class="logo_container">
                <img src=logo.png>
            </div>

            <div class="footer_third">
                <h1>Need Help?</h1>
                <a href="#">Terms &amp; Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="footer_third">
                <h1>More</h1>
                <a href="#">Donate</a>
                <a href="#">Governance</a>
                <a href="#">Report</a>
            </div>
            <div class="footer_third">
                <h1>Follow Us</h1>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>

            </div>
        </div>
    </div>

</body>

</html>