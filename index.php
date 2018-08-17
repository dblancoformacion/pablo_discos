<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>COLECCION DE DISCOS DE PABLO</title>
	<link rel="stylesheet" type="text/css" href="discos.css">
</head>
<body>
	<div class="wrapper">
		<div class="formulario">
			<form>
				<p>¡Introduce el disco que quieres para ver su cotización!</p>
				<input type="text" name="busqueda">
				<input type="submit" value="Ir">
			</form>
		</div>
		<?php

		if(isset($_GET['busqueda'])){
			$datos = ['127.0.0.1', 'root', '', 'discos'];

			$conn = new mysqli($datos[0], $datos[1], $datos[2], $datos[3]);
			if(!$conn){
				echo "ERROR de conexion a bbdd";
			}
			$res = $conn->query("SELECT titulo, precio FROM produccion WHERE titulo LIKE '%".$_GET['busqueda']."%';");
			$array = $res->fetch_assoc();

			$conn->close();
		}
		?>
		<br><br>
		<div class='fila'>
			<div class='celda'>
				<p>DISCO:</p>
				<?php
					if(isset($array)){
						echo $array['titulo'];
					} 
				?>
			</div>
			<div class='fila'>
				<p>PRECIO:</p>
				<?php
					if(isset($array)){
						echo $array['precio'];
					}
				?>
				<p> euros</p>
			</div>
		</div>
		<br><br>
		<a href="mas-cotizado.php">Disco más cotizado</a>
		<a href="mas-valiosos.php">Discos por encima de 12 euros</a>
	</div>
</body>
</html>