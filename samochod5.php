<?php require_once("config_connection.php"); ?>


<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Wypożyczalnia Samochodowa A J J</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .imgCar {
            margin: 15% 5%;
        }

        #zdjecie {
            float: left;
            width: 45%;
            font-size: 150%;
            padding-top: 12%;
        }

        input[type="number"] {
            width: 10%;
            height: 25px;
        }

        #dane {
            float: left;
            margin-top: 5%;
            margin-left: 7%;
            font-size: 130%;
            color: black;
            font-family: 'Montserrat', sans-serif;
        }

        .lista {

            border-bottom: 3px solid grey;


            margin-top: 5%;
            padding-bottom: 1%;
        }

        .lwynik {
            padding-left: 25rem;
            float: right;
            text-align: center;
        }

        #container {
            background-color: white;
            height: 700px;
        }

        #formularz {
            text-align: center;
            font-size: 150%;
            font-family: 'Montserrat', sans-serif;
        }

        input[type="submit"] {
            background-color: #18181a;
            color: white;
            width: 10%;
            height: 40px;
            border-radius: 2px;
            font-size: 80%;
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


        <div id="zdjecie">
            <img src="jpg/5.png" class="imgCar" />
        </div>

        <div id="dane">


            <?php



            $sth = $db->query('select * from samochody where id_samochodu = 5;');
            $sth->execute();

            while ($row = $sth->fetch()) {
                $_SESSION['id_samochodu'] = $row['id_samochodu'];

                $marka = $row['marka'];
                $model = $row['model'];
                $rocznik = $row['rocznik'];
                $kolor = $row['kolor'];
                $pojemnosc = $row['pojemnosc'];
                $moc = $row['moc'];
                $cena = $row['cena_doba'];
                $spalanie = $row['spalanie'];
            }

            $_SESSION['cena_samochodu'] = $cena;





            ?>


            <li class='lista'>Marka <a class="lwynik"><?php echo $marka; ?></a></li>
            <li class='lista'>Model <a class="lwynik"><?php echo $model; ?></a></li>
            <li class='lista'>Rocznik <a class="lwynik"><?php echo $rocznik; ?></a></li>
            <li class='lista'>Kolor <a class="lwynik"><?php echo $kolor; ?></a></li>
            <li class='lista'>Pojemność <a class="lwynik"><?php echo $pojemnosc; ?></a></li>
            <li class='lista'>Moc[KM] <a class="lwynik"> <?php echo $moc; ?></a></li>
            <li class='lista'>Cena <a class="lwynik"><?php echo $cena; ?></a></li>
            <li class='lista'>Spalanie <a class="lwynik"> <?php echo $spalanie; ?></a></li>


        </div>




    </div>

    <div id="formularz">
        <form action="user.php" method="post">
            Na ile dni chcesz wypożyczyć nasz samchód?
            <input type="text" name="ileDni" /><br><br>
            <input type="submit" value="Wypożycz" name="wypozycz" />
        </form>
    </div>

    <!-- FOOTER -->

    <div class="footer">
        <div class="inner_footer">
            <div class="logo_container">
                <img src=logo.png>

            </div>

            <div class="footer_third">
                <center>
                    <h1>Zadowoleni klienci: </h1>
                    <a><?php echo $_SESSION['ileUzytkownikow']; ?></a>
                </center>
            </div>

            <div class="footer_third">
                <center>
                    <h1>Need Help?</h1>
                    <a href="#">Terms &amp; Conditions</a>
                    <a href="#">Privacy Policy</a>
                </center>
            </div>

            <div class="footer_third">
                <center>
                    <h1>Follow Us</h1>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </center>
            </div>
        </div>
    </div>

</body>

</html>