<?php

require_once 'conexion.php';
?>




<html>
<head>
<meta charset="utf8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<title>Diseño de plataforma</title>

<style>

.superior{

width:100%;
height:80px;
background-color:rgb(0, 0, 0);
border:1px solid #333;
text-align: left;
}

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #fafaff;
}

#id_personas{
	visibility: hidden;
	opacity: 0;
	position:absolute;
	
}

.button-container {
  position: fixed;
  top: 20px;
  right: 20px;
  display: flex;
  gap: 10px; /* Espacio entre los botones */
}

button {
  padding: 10px 20px;
  background-color: #026c9c;
  color: rgb(255, 255, 255);
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
button#submitLogin{
	background-color: #0726b1;
}
button#cancelLogin{
	background-color: rgb(179, 52, 14);
}
button#registerButton {
  background-color: #e4510d; /* Color diferente para el botón de registro */
}
button#ini
button:hover {
  opacity: 0.9;
}

.login-container {
  display: none;
  flex-direction: column;
  background: #ffffff;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  position: absolute;
  top: 20px;
  right: 20px;
  width: 250px;
}


.menu{

width:80px;
height:100%;
background-color:black;
border:1px solid #333;
float:left;
}

.menu2{

width:100%;
height:70px;
background-color:#292929;

margin:auto;
}

.cuerpo{

width:80%;
height:90%;
background-color:#666;
float:right;
}

.cuerpo h2 {
            text-align: left;
            color: #0c0c0c;
}

form {
            background-color: rgb(78, 160, 160);
            color: black;
            border-radius: 10px;
            padding: 110px;
			border: 5px solid #242121;
			margin: 20px;
			align-items: center;
			
        }

 form input, form select {
    padding-top: 1px; /* Espaciado interno */
    margin-bottom: 5px; /* Espacio entre los campos */
    border: 1px solid #555252; /* Borde de los campos */
    border-radius: 5px; /* Bordes redondeados */
    box-sizing: content-box; /* Incluye el padding dentro del ancho */
    font-size: 14px; /* Tamaño de texto consistente */
		
}


body {
background-color:black;
	
}
.icono{
width:100%;
height:60px;

padding:22px;
}

.icono:hover {
transform:scale(1.5);	
border:none;
}




#menu {
	background: #292929;
	height: 70px;
	padding-right: 18px;
	border-radius: 0px;
}
#menu ul, #menu li {
	margin: 0 auto;
	padding: 0;
	list-style: none
}
#menu ul {
	width: 100%;
	text-align: right;
}
#menu li {
	display: inline-block;
	position: relative;
}
#menu a {
	display: block;
	line-height: 70px;
	padding: 0 14px;
	text-decoration: none;
	color: #FFFFFF;
	font-size: 16px;
}
#menu a.dropdown-arrow:after {
	content: "\25BE";
	margin-left: 5px;
}
#menu li a:hover {
	color: #1c38b8;
	;
}
#menu input {
	display: none;
	margin: 0;
	padding: 0;
	height: 70px;
	width: 100%;
	opacity: 0;
	cursor: pointer
}
#menu label {
	display: none;
	line-height: 70px;
	text-align: center;
	position: absolute;
	left: 35px
}
#menu label:before {
	font-size: 1.6em;
	color: #FFFFFF;
	content: "\2261"; 
	margin-left: 20px;
}
#menu ul.sub-menus{
	height: auto;
	overflow: hidden;
	width: 170px;
	background: #444444;
	position: absolute;
	z-index: 99;
	display: none;
}
#menu ul.sub-menus li {
	display: block;
	text-align: left;
	width: 100%;
}
#menu ul.sub-menus a {
	color: #FFFFFF;
	font-size: 16px;
}
#menu li:hover ul.sub-menus {
	display: block
}
#menu ul.sub-menus a:hover{
	background: #F2F2F2;
	color: #444444;
}
@media screen and (max-width: 800px){
	#menu {position:relative}
	#menu ul {background:#444444;position:absolute;top:100%;right:0;left:0;z-index:3;height:auto;display:none;text-align:left;}
	#menu ul.sub-menus {width:100%;position:static;}
	#menu ul.sub-menus a {padding-left:30px;}
	#menu li {display:block;float:none;width:auto;}
	#menu input, #menu label {position:absolute;top:0;left:0;display:block}
	#menu input {z-index:4}
	#menu input:checked + label {color:#FFFFFF}
	#menu input:checked + label:before {content:"\00d7"}
	#menu input:checked ~ ul {display:block}
}




</style>


</head>

<body>

<div class="superior"> 
	<div class="button-container">
		<button id="loginButton">Iniciar Sesión</button>
		<button id="registerButton">Registrarse</button>
	  </div>
	  <div class="login-container" id="loginContainer">
		<input type="text" id="username" placeholder="Correo o Usuario" />
		<input type="password" id="password" placeholder="Contraseña" />
		<button id="submitLogin">Iniciar Sesión</button>
		<button class="cancel" id="cancelLogin">Cancelar</button>
		<a href="#">¿Olvidaste tu contraseña?</a>
	  </div>
	  <button id="logoutButton" style="display: none;">Cerrar Sesión</button>
	
  <script>
    const loginButton = document.getElementById('loginButton');
	const registerButton = document.getElementById('registerButton');
    const logoutButton = document.getElementById('logoutButton');
    const loginContainer = document.getElementById('loginContainer');
    const cancelLogin = document.getElementById('cancelLogin');
    const submitLogin = document.getElementById('submitLogin');

    // Abrir formulario de inicio de sesión
    loginButton.addEventListener('click', () => {
      loginContainer.style.display = 'flex';
      loginButton.style.display = 'none';
	  registerButton.style.display = 'none';
    });

    // Cancelar inicio de sesión
    cancelLogin.addEventListener('click', () => {
      loginContainer.style.display = 'none';
      loginButton.style.display = 'block';
	  registerButton.style.display = 'block';
    });

    // Iniciar sesión (simulación)
    submitLogin.addEventListener('click', () => {
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      if (username && password) {
        alert('Sesión iniciada correctamente');
        loginContainer.style.display = 'none';
        logoutButton.style.display = 'block';
      } else {
        alert('Por favor, completa todos los campos');
      }
    });

    // Cerrar sesión
    logoutButton.addEventListener('click', () => {
      alert('Sesión cerrada');
      logoutButton.style.display = 'none';
      loginButton.style.display = 'block';
	  registerButton.style.display = 'block';
    });
  </script>






</div>
<div class="menu">

<div class="icono"> <a href="" alt="Chat"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
</svg>
</svg></a></div>
<div class="icono">

<a href="" alt="Chat"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
  <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
  <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
</svg></a>


</div>
<div class="icono"></div>
<div class="icono"></div>
<div class="icono"></div>
<div class="icono"></div>
<div class="icono"></div>
<div class="icono"></div>


</div>
<div class="menu2"> 

<nav id='menu'>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='#'><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
</svg></a></li>
    <li><a class='dropdown-arrow' href='#'><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></a> </li>
    <li><a href='#'><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
</svg></a></li>
    
    <li><a href='#'><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
</svg></a></li>
  </ul>
</nav>




</div>
<div class="cuerpo">
	
<form action="guardar.php" method="post">
	<h2>Formulario de Registro</h2> <br>
	<input type="text" name="id_personas" id="id_personas"> 
Tipo de Cedula: <select name="tipo" style="width: auto; padding-bottom: 0%;" required>
	<option value="CC">CC</option>
	<option value="CE">CE</option>
	</select> <br> 
Numero de Cedula: <input type="number" name="cedula" required>
Sexo: <select name="sexo" style="width: auto; padding-bottom: 0%;">
	<option value="M">M</option>
	<option value="F">F</option>
	<option value="Otro">Otro</option>
	</select> <br>
Nombres: <input type="text" name="nombres" required> 
Apellidos: <input type="text" name="apellidos" required> 
Telefono: <input type="number" name="telefono" style="width: 150px;"> <br>
E-mail: <input type="email" name="email" style="width: 250px;"> 
Fecha Cumpleaños: <input type="date" name="cumple" required> 
Estrato: <select name="estrato">
	<option value="uno">1</option>
	<option value="dos">2</option>
	<option value="tres">3</option>
	<option value="cuatro">4</option>
	<option value="cinco">5</option>
	<option value="rural">Rural</option>
</select> 
Departamento: <select id="departamento" name="departamento" style="width: custom-select;">
	<option value="">-- Seleccione --</option>
	<option value="amazonas">Amazonas</option>
	<option value="antioquia">Antioquia</option>
	<option value="arauca">Arauca</option>
	<option value="atlantico">Atlántico</option>
	<option value="bolivar">Bolívar</option>
	<option value="boyaca">Boyacá</option>
	<option value="caldas">Caldas</option>
	<option value="caqueta">Caquetá</option>
	<option value="casanare">Casanare</option>
	<option value="cauca">Cauca</option>
	<option value="cesar">Cesar</option>
	<option value="choco">Chocó</option>
	<option value="cordoba">Córdoba</option>
	<option value="cundinamarca">Cundinamarca</option>
	<option value="guainia">Guainía</option>
	<option value="guaviare">Guaviare</option>
	<option value="huila">Huila</option>
	<option value="la_guajira">La Guajira</option>
	<option value="magdalena">Magdalena</option>
	<option value="meta">Meta</option>
	<option value="narino">Nariño</option>
	<option value="norte_de_santander">Norte de Santander</option>
	<option value="putumayo">Putumayo</option>
	<option value="quindio">Quindío</option>
	<option value="risaralda">Risaralda</option>
	<option value="san_andres">San Andrés y Providencia</option>
	<option value="santander">Santander</option>
	<option value="sucre">Sucre</option>
	<option value="tolima">Tolima</option>
	<option value="valle_del_cauca">Valle del Cauca</option>
	<option value="vaupes">Vaupés</option>
	<option value="vichada">Vichada</option>
</select> 
Municipio: <select name="municipio" style="width: custom-select;">
	<option value="">-- Seleccione --</option>
	<option value="aguazul">Aguazul</option>
	<option value="apartadó">Apartadó</option>
	<option value="arauca">Arauca</option>
	<option value="armenia">Armenia</option>
	<option value="barbosa">Barbosa</option>
	<option value="barichara">Barichara</option>
	<option value="barranquilla">Barranquilla</option>
	<option value="bello">Bello</option>
	<option value="bogotá">Bogotá</option>
	<option value="bucaramanga">Bucaramanga</option>
	<option value="buenaventura">Buenaventura</option>
	<option value="buga">Buga</option>
	<option value="cali">Cali</option>
	<option value="cartagena">Cartagena</option>
	<option value="cartago">Cartago</option>
	<option value="cereté">Cereté</option>
	<option value="chinú">Chinú</option>
	<option value="chiquinquirá">Chiquinquirá</option>
	<option value="chía">Chía</option>
	<option value="chía">Chía</option>
	<option value="ciénaga">Ciénaga</option>
	<option value="corozal">Corozal</option>
	<option value="curití">Curití</option>
	<option value="cúcuta">Cúcuta</option>
	<option value="duitama">Duitama</option>
	<option value="el carmen de bolívar">El Carmen de Bolívar</option>
	<option value="envigado">Envigado</option>
	<option value="espinal">Espinal</option>
	<option value="florencia">Florencia</option>
	<option value="floridablanca">Floridablanca</option>
	<option value="funza">Funza</option>
	<option value="fusagasugá">Fusagasugá</option>
	<option value="garzón">Garzón</option>
	<option value="girardot">Girardot</option>
	<option value="girón">Girón</option>
	<option value="honda">Honda</option>
	<option value="ibagué">Ibagué</option>
	<option value="ipiales">Ipiales</option>
	<option value="itagüí">Itagüí</option>
	<option value="jamundí">Jamundí</option>
	<option value="la dorada">La Dorada</option>
	<option value="leticia">Leticia</option>
	<option value="lorica">Lorica</option>
	<option value="magangué">Magangué</option>
	<option value="malambo">Malambo</option>
	<option value="manizales">Manizales</option>
	<option value="medellín">Medellín</option>
	<option value="melgar">Melgar</option>
	<option value="mitú">Mitú</option>
	<option value="mocoa">Mocoa</option>
	<option value="montelíbano">Montelíbano</option>
	<option value="montería">Montería</option>
	<option value="mosquera">Mosquera</option>
	<option value="neiva">Neiva</option>
	<option value="pacho">Pacho</option>
	<option value="palmira">Palmira</option>
	<option value="pasto">Pasto</option>
	<option value="pereira">Pereira</option>
	<option value="piedecuesta">Piedecuesta</option>
	<option value="pitalito">Pitalito</option>
	<option value="popayán">Popayán</option>
	<option value="puerto carreño">Puerto Carreño</option>
	<option value="puerto colombia">Puerto Colombia</option>
	<option value="puerto inírida">Puerto Inírida</option>
	<option value="quibdó">Quibdó</option>
	<option value="riohacha">Riohacha</option>
	<option value="rionegro">Rionegro</option>
	<option value="sabanalarga">Sabanalarga</option>
	<option value="sabaneta">Sabaneta</option>
	<option value="sahagún">Sahagún</option>
	<option value="san andrés">San Andrés</option>
	<option value="san gil">San Gil</option>
	<option value="san josé del guaviare">San José del Guaviare</option>
	<option value="san marcos">San Marcos</option>
	<option value="san martín">San Martín</option>
	<option value="san vicente de chucurí">San Vicente de Chucurí</option>
	<option value="santa marta">Santa Marta</option>
	<option value="saravena">Saravena</option>
	<option value="sincelejo">Sincelejo</option>
	<option value="soacha">Soacha</option>
	<option value="socorro">Socorro</option>
	<option value="sogamoso">Sogamoso</option>
	<option value="soledad">Soledad</option>
	<option value="tame">Tame</option>
	<option value="tuluá">Tuluá</option>
	<option value="tumaco">Tumaco</option>
	<option value="tunja">Tunja</option>
	<option value="turbo">Turbo</option>
	<option value="valledupar">Valledupar</option>
	<option value="villa de leyva">Villa de Leyva</option>
	<option value="villanueva">Villanueva</option>
	<option value="villavicencio">Villavicencio</option>
	<option value="yopal">Yopal</option>
	<option value="zipaquirá">Zipaquirá</option>
</select> <br>
Barrio: <input type="text" name="barrio" required> 
Direccion Residencia: <input type="text" name="direccion" required><br>
Nombre Lider: <input type="text" name="lider" required>
Lugar de Votacion: <input type="text" name="lugar" required><br>
Mesa de Votacion: <input type="text" name="mesa" required> 

Aceptar el tratamiento de datos personales: <input type="radio" name="tratamiento" value="tratamiento" required> <br>


<input type="submit" name="guardar" value="Guardar" style="background-color: blue; color: white; border: none; padding: 10px 20px"> 
<input type="reset" name="cancelar" value="Cancelar" style="background-color: rgb(255, 0, 0); color: white; border: none; padding: 10px 20px">



</form>

<table border="1" class="table table-striped table-bordered ">

    <thead>
<tr>
<th> id </th> 
<th> tipo </th>
<th> cedula </th>
<th> nombres </th> 
<th> apellidos </th>
<th> telefono </th> 
<th> email </th>
<th> cumple </th>
<th> estrato </th>
<th> barrio </th>
<th> sexo </th>
<th> departamento </th>
<th> municipio </th>
<th> direccion </th>
<th> lider </th>
<th> lugar </th>
<th> mesa </th>

</tr>
    </thead>

<tbody>

<?php

$consulta = mysqli_query($conn, "SELECT * FROM personas");
                                while($row = mysqli_fetch_assoc($consulta)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_personas'] . "</td>";
                    echo "<td>" . $row['tipo'] . "</td>";
                    echo "<td>" . $row['cedula'] . "</td>";
					echo "<td>" . $row['nombres'] . "</td>";
					echo "<td>" . $row['apellidos'] . "</td>";
					echo "<td>" . $row['telefono'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['cumple'] . "</td>";
					echo "<td>" . $row['estrato'] . "</td>";
					echo "<td>" . $row['barrio'] . "</td>";
					echo "<td>" . $row['sexo'] . "</td>";
					echo "<td>" . $row['departamento'] . "</td>";
					echo "<td>" . $row['municipio'] . "</td>";
					echo "<td>" . $row['direccion'] . "</td>";
					echo "<td>" . $row['lider'] . "</td>";
					echo "<td>" . $row['lugar'] . "</td>";
					echo "<td>" . $row['mesa'] . "</td>";
                    echo "</tr>";
                }
             
                mysqli_close($conn);

?> 

</tbody>
</table>



</div>


</body>
</html>