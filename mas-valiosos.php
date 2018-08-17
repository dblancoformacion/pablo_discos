<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Discos más valiosos</title>
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
			$consulta = "SELECT titulo, precio FROM produccion WHERE precio > 11 ORDER BY precio DESC;";
			$res = $conn->query($consulta);
			$array = $res->fetch_all();

			$conn->close();
		?>
		<div class='tabla'>
			<div class='fila'>
				<div class='celda'>
					<p>Discos que se cotizan a 12 euros o más:</p>
				</div>
			</div>
			<div class='fila'>
				<div class='celda'>
					<p>DISCO:</p>
					<?php
						if(isset($array)){
							foreach($array as $clave => $valor){
								echo $valor[0];
								echo "<br>";
							}
						} 
					?>
				</div>
				<div class='celda'>
					<p>PRECIO:</p>
					<?php
						if(isset($array)){
							foreach ($array as $clave => $valor){
								echo $valor[1];	
								echo "<br>";
							}
						}
					?>
					<p> euros</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>