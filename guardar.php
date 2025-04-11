<?php 
require_once 'conexion.php';

mysqli_set_charset($conn, "utf8mb4");

$id_personas=trim($_POST['id_personas']);
$tipo=trim($_POST['tipo']);
$cedula=trim($_POST['cedula']);
$nombres=trim($_POST['nombres']);
$apellidos=trim($_POST['apellidos']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$cumple=trim($_POST['cumple']);
$estrato=trim($_POST['estrato']);
$barrio=trim($_POST['barrio']);
$sexo=trim($_POST['sexo']);
$departamento=trim($_POST['departamento']);
$municipio=trim($_POST['municipio']);
$direccion=trim($_POST['direccion']);
$lider=trim($_POST['lider']);
$lugar=trim($_POST['lugar']);
$mesa=trim($_POST['mesa']);
$tratamiento=trim($_POST['tratamiento']);


$consulta = mysqli_query($conn, "SELECT * FROM personas WHERE LOWER(cedula)=LOWER('$cedula')");


if(mysqli_num_rows($consulta)==0) {
    
    $query="INSERT INTO personas(id_personas,tipo,cedula,nombres,apellidos,telefono,email,cumple,estrato,barrio,sexo,departamento,municipio,direccion,lider,lugar,mesa,tratamiento) VALUES('$id_personas','$tipo','$cedula','$nombres','$apellidos','$telefono','$email','$cumple','$estrato','$barrio','$sexo','$departamento','$municipio','$direccion','$lider','$lugar','$mesa','$tratamiento')";

   
    if (mysqli_query($conn,$query)) {
         echo "Datos guardados exitosamente";
       } else {
        echo "Error, datos No guardados: " . mysqli_error($conn);
    }
} else {
    echo "Los datos no fueron guardados, ya existe un registro con la misma cédula";
}

header("location: index.php");
exit();

mysqli_close($conn);

?>