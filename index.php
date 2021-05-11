<?php session_start() ?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Wypożyczalnia Samochodowa A J J</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        #line2 {
            padding-top: 10%;
        }

        .card_container {
            position: relative;
            width: 400px;
            height: 320px;
            margin-left: 16px;
            margin-right: 16px;
        }

        .card {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: all 0.5s;
        }

        .card:hover {
            transform: scaleY(1.1);
        }

        .card_front {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            background: white;
            text-align: center;
            border-radius: 20px;
        }

        .card_back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            background: #1946bf;
            text-align: center;
            border-radius: 20px;
            transform: rotateY(180deg);
        }

        li:hover {
            font-style: WHITE;

        }

        h2{
            font-family: 'arial';
            color: black;
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
        <div class="line1">
            <img class="img-add" src="add.png" alt="">
        </div>

        <!-- LINIA 2 -->

        <div id="line2">

            <div class="card_container" style="float:left">
                <div class="card">
                    <a href="samochod1.php" >
                        <div class="card_front">
                            <img src="jpg/1.png"/>
                            
                            <h2>TOYOTA YARIS</h2> 
                        </div>
                    </a>

                </div>
            </div>

            <div class="card_container" style="float:left">
                <div class="card">
                <a href="samochod2.php" >
                        <div class="card_front">
                            <img src="jpg/2.png"/>
                            
                            <h2>OPEL ASTRA</h2> 
                        </div>
                    </a>
                </div>
            </div>

            <div class="card_container" style="float:left">
                <div class="card">
                <a href="samochod3.php">
                        <div class="card_front">
                            <img src="jpg/3.png"/>
                            
                            <h2>RENAULT CAPTUR</h2> 
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- LINIA 3 -->

        <div id="line3" style="clear: both;">

            <div class="card_container" style="float:left">
                <div class="card">
                <a href="samochod4.php">
                        <div class="card_front">
                            <img src="jpg/4.png"/>
                            
                            <h2>OPEL ASTRA</h2> 
                            
                        </div>
                    </a>
                </div>
            </div>

            <div class="card_container" style="float:left">
                <div class="card">
                <a href="samochod5.php">
                        <div class="card_front">
                            <img src="jpg/5.png"/>
                            
                            <h2>KIA SPORTAGE</h2> 
                        </div>
                    </a>
                </div>
            </div>

            <div class="card_container" style="float:left">
                <div class="card">
                <a href="samochod6.php">
                        <div class="card_front">
                            <img src="jpg/1.png"/>
                            <h2>TOYOTA YARIS</h2> 
                        </div>
                    </a>
                </div>
            </div>

            <div style="clear:both"></div>
        </div>
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