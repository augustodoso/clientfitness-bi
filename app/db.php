<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // XAMPP padrão
$DB_NAME = 'portfolio_db';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
  http_response_code(500);
  die("Erro MySQL: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
