<?php
session_start();
require_once("config_connection.php");
if(isset($_POST['login'])){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $sth = $db->prepare('SELECT * FROM user WHERE email=:email limit 1');
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->execute();
  $user = $sth->fetch(PDO::FETCH_ASSOC);
  if($user){
    if(password_verify($password,$user['password'])){
      $_SESSION['email'] = $user['email'];
      $_SESSION['id_uzytkownika'] = $user['id'];
      header('Location: index.php');
    }else{
      $_SESSION['err_password'] = "Nieprawidlowe haslo lub email!";
      header('Location: login.php');
    }
  }else{
    $_SESSION['err_user'] = "Nieznaleziono takiego użytkownika!";
    header('Location: login.php');
  }
}
?>