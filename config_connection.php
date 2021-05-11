<?php
session_start();
$host = "127.0.0.1";
$baza = "dbwypozyczalnia";
$user = "root";
$password = "";

try{
  $db = new PDO('mysql:host='.$host.';dbname='.$baza,$user,$password);
}
catch (PDOException $e){
  die ("Error connecting to database!");
}

  $sth = $db->query('select count(id) as countUser from user;');
  $sth->execute();


  while($row = $sth->fetch())
    $_SESSION['ileUzytkownikow'] = $row['countUser'];

