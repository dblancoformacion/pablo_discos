<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Disco más cotizado</title>
	<link rel="stylesheet" type="text/css" href="discos.css">
</head>
<body>
	<div class="wrapper">
		<?php
			$datos = ['127.0.0.1', 'root', '', 'discos'];

			$conn = new mysqli($datos[0], $datos[1], $datos[2], $datos[3]);
			if(!$conn){
				echo "ERROR de conexion a bbdd";
			}
			$consulta = "SELECT titulo, precio FROM produccion WHERE precio = (
				SELECT MAX(p) cot FROM (SELECT precio p FROM produccion ORDER BY precio DESC) c1);";
			$res = $conn->query($consulta);
			$array = $res->fetch_assoc();

			$conn->close();
		?>
		<div class='tabla'>
			<div class='fila'>
				<div class='celda'>
					<p>El disco que más se cotiza es:</p>
				</div>
			</div>
			<div class='fila'>
				<div class='celda'>
					<p>DISCO:</p>
					<?php
						if(isset($array)){
							echo $array['titulo'];
						} 
					?>
				</div>
				<div class='celda'>
					<p>PRECIO:</p>
					<?php
						if(isset($array)){
							echo $array['precio'];
						}
					?>
					<p> euros</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>