<?php  

$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'electoral';

$conn = mysqli_connect($host, $nom, $pass, $db);

if(!$conn)
{
    die("Error en la conexion:".mysqli_connect_error());
}
mysqli_set_charset ($conn, "utf8");
?>