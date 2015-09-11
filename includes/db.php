<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=forumLePoles';
$user = 'root';
$pass = '';
$pdo = new PDO($dsn, $user, $pass);