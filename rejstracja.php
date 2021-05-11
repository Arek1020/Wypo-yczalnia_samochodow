<?php
session_start();
require_once("config_connection.php");
if(isset($_POST['zarejstruj'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeat_password = $_POST['repeat_password'];
  $hashPassword = password_hash($password,PASSWORD_BCRYPT);

//   $adduser = "insert into user(email,password) values ('".$email."',$password');";
//   $result = $db->query($adduser);
//   if($db->affected_rows >= 1) echo 'Rejestracja pomyslna!';

if($password == $repeat_password)
{
  $sth = $db->prepare('INSERT INTO user (email,password) VALUE (:email,:password)');
  $sth->bindValue(':email', $email, PDO::PARAM_STR);
  $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
  $sth->execute();

  $_SESSION['registerOK'] = 'Rejestracja pomyslna! Mozesz się zalogować :)';
  header('Location: register.php');
}
else{
  $_SESSION['err_register'] = "Nieprawidlowe haslo lub email!";
      header('Location: register.php');
    
}
}

?>