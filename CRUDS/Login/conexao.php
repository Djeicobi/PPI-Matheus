<?php 

$usuario = 'root';
$senha = '';
$database  = 'PPI-Matheus';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falaha ao conectar ao banco de dados: " . $mysqli->error);
}
?>