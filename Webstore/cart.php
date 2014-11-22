<?php
// skilum UTF-8 til vafra með header
header('Content-Type: text/html; charset=utf-8');

// hér er pdo cursorinn skilgreindur
$cursor = new PDO("sqlite:SQL/gamestore.db");
$id = $_GET['id'];

//Setjum hausinn á síðunni
include('views/header.php');
include('views/contents.php');
include('views/footer.php');