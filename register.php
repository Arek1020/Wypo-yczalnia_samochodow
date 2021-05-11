<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Panel rejestracji</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        #container
        {
            background-color: white;
            font-family: 'Montserrat', sans-serif;
            width: auto;
            height: auto;
            height: auto;
        }
        
        #napis_rejestracja
        {
            font-size: 55px;
            padding: 5px;
            border: solid;
        }
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical
        }
        
        input[type=password], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical
        }
        
        input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        #cont {
            margin-top: 20px;
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
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
                <a href="login.php"><li>Zaloguj się</li></a>
                <a href="register.php"><li>Zarejestruj się</li></a>
                <a href="contact.html"><li>Kontakt</li></a>
            </ul>
        </div>
    </div>
    
    <br/>
    
    <!-- CONTAINER -->
    
    <div id="container">
        <center>
           <a id="napis_rejestracja">REJESTRACJA</a>
           <div id="cont">

           <?php if(!empty($_SESSION['err_register'])) echo $_SESSION['err_register']; $_SESSION['err_register']="";?>
           <?php if(!empty($_SESSION['registerOK']))  header('Location: login.php'); ?>

              <form action="rejstracja.php" method="post">

                <label for="email">E-mail</label>
                <input type="text" id="email" name="email">

                <label for="password">Hasło</label>
                <input type="password" id="password" name="password">
                
                <label for="password">Powtrórz hasło</label>
                <input type="password" id="password" name="repeat_password">
                
                <input type="submit" name="zarejstruj" value="Zarejstruj" />

              </form>
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