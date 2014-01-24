<?php 
//variables globales



function connect(){
	global $mysql_servidor, $mysql_usuario, $mysql_contra, $mysql_bd,$conexion;
	$conexion=mysql_connect($mysql_servidor, $mysql_usuario, $mysql_contra);
	if(!$conexion){
		die("No se pudo conectar a la base de datos".mysql_error());
	}
	$result =mysql_query("USE $mysql_bd");
	if (!$result) {
		die( 'MySQL Error: ' . mysql_error()."<br/>");
	}
}
function disconnect(){
	global $conexion;
	mysql_close($conexion);
}

function modulo($modulo, $cssclase="",$cssid=""){
    if($cssclase!=""){
		$cssclase='class="'.$cssclase.'"';
    }
	
	if($cssid!=""){
	   $cssid='id="'.$cssid.'"';
	}
	echo '<div '.$cssclase.' '.$cssid.'>';
	require('modulos/'.$modulo.".modulo.php");
	echo '</div>';
}

function getCountriesOptions(){
	connect();
	$idCountry = 'idPais';
	$nameCountry = 'nombre';

	mysql_set_charset("UTF8");
	$result = mysql_query("select p.idPais,  p.nombre from paises p");
	$cant = mysql_num_rows($result);
	if($cant==0){
		echo "<option value='-1'>There aren't any country</option>";
		disconnect();
		exit;
	}
	echo "<option value='-1'>Select a country.</option>";
	while($row = mysql_fetch_array($result)){
		$id = $row[$idCountry];
		$name = $row[$nameCountry];
		echo "<option value=$id>$name</option>";
	}
	disconnect();
}

function getStatesOptiones(){
	connect();
	$idState = 'idEstado';
	$nameEstado = 'nombre';

	mysql_set_charset("UTF8");
	$result = mysql_query("select e.idEstado,  e.nombre 
							from estados e 
							where e.idPais=$_POST[id];");

	$cant = mysql_num_rows($result);
	if($cant==0){
		echo "<option value='-1'>There aren't any state.</option>";
		disconnect();
		exit;
	}
	while($row = mysql_fetch_array($result)){
		$id = $row[$idState];
		$name = $row[$nameEstado];
		echo "<option value=$id>$name</option>";
	}
	disconnect();
}

function getCityOptions(){
	connect();
	$idCity = 'idCiudad';
	$nameEstado = 'nombre';


	mysql_set_charset("UTF8");
	$result = mysql_query("select c.idCiudad,  c.nombre 
							from ciudades c
							where c.idPais=$_POST[idPais] and c.idEstado=$_POST[idEstado];");

	$cant = mysql_num_rows($result);
	if($cant==0){
		echo "<option value='-1'>There aren't any city.</option>";
		disconnect();
		exit;
	}
	while($row = mysql_fetch_array($result)){
		$id = $row[$idCity];
		$name = $row[$nameEstado];
		echo "<option value=$id>$name</option>";
	}
	disconnect();

}


function getGridPromotion(){
	connect();
	$result = mysql_query("SHOW COLUMNS FROM promociones");
	$cant = mysql_num_rows($result);
	if($cant==0){
		die ("The Table doesn't have any field or structure.<br/>");
	}
	echo "<table class='table fpTable2 lcnp' cellpadding='0' cellspacing='0'>";
	echo "<thead><tr> <th>Select</th>";
	$fieldnames=array(); 
	for($i=0;$i<$cant;$i++){
		$row = mysql_fetch_assoc($result);
		echo "<th>{$row['Field']}</th>";
		$fieldnames[] = $row['Field'];
	}
	echo "<th>Actions</th></tr></thead><tbody>";
	
	mysql_set_charset("UTF8");
	$result = mysql_query("SELECT * FROM promociones");
	
	$counter =528;
	while ($row = mysql_fetch_array($result)) {
		$id = $row['idPromocion'];
		echo "<tr><td><input type='checkbox' name='checkbox' name='order[]'' value='{$counter}'/></td>";
		$counter--;
		for($i=0;$i<$cant;$i++){
			if($fieldnames[$i]=="imagen"){
				$valueTemp = base64_encode($row[$fieldnames[$i]]);
				echo "<td><a class='fb2' href='data:image/jpeg;base64,$valueTemp'><img src='data:image/jpg;base64, $valueTemp' class='img-polaroid' /></a></td>";
			}else if($fieldnames[$i]=="idPromocion"){
				echo "<td id='tdPromotion'>{$row[$fieldnames[$i]]}</td>";
			}else{
				echo "<td>{$row[$fieldnames[$i]]}</td>";	
			}
			

		}
		echo "<td><a class='button red deletePromotion'><div class='icon'><span class='ico-remove'></span></div></a></td></tr>";
	}
	echo "</tbody>";
	disconnect();
}

function showTableData($name,$actions=false){
		connect();
		if($name=="promociones"){
			getGridPromotion();
			exit;
		}
		echo "<table class='table fpTable3 lcnp' cellpadding='0' cellspacing='0'>";
 		$result = mysql_query("SHOW COLUMNS FROM $name"); 
  		
  		$cant = mysql_num_rows($result); 
  		if($cant==0){
  			die ("The Table doesn't have any field or structure.<br/>");
  		}
  			echo "<thead><tr>";
  			if($actions)
				echo "<th>Select</th>";
			$fieldnames=array(); 
			for($i=0;$i<$cant;$i++){
				$row = mysql_fetch_assoc($result);
				echo "<th>{$row['Field']}</th>";
				$fieldnames[] = $row['Field'];
			}
			if($actions)
				echo "<th>Actions</th>";
			echo "</tr></thead><tbody>";
			
			$result = mysql_query("SELECT * FROM $name");
			mysql_set_charset("UTF8");

			$counter=528;
			while ($row = mysql_fetch_array($result)) {
				echo"<tr>";
				if($actions)
					echo "<td><input type='checkbox' name='order[]'' value='{$counter}'/></td>";
				$counter--;
				for($i=0;$i<$cant;$i++){
					if($fieldnames[$i]=="estatus"){
						echo "<td><span class='label label-important'>{$row[$fieldnames[$i]]}</span></td>";
					}else{
						echo "<td>{$row[$fieldnames[$i]]}</td>";	
					}
					
				}
				if($actions)
					echo "<td><a href='#' class='button green'><div class='icon'><span class='ico-pencil'></span></div></a><a href='#'' class='button red'><div class='icon'><span class='ico-remove'></span></div></a></td>";
				echo "</tr>";
			}
			echo "</tbody>";
			disconnect();
	}

	function addPromotion($sd,$ed,$cit,$coun,$est,$des){
		connect();
		if(isset($_FILES["photo"])){
			@list(, , $imtype, ) = getimagesize($_FILES['photo']['tmp_name']);


			if ($imtype == 2)
                $ext="jpeg";
            else
                $msg = 'Error: unknown file format';

            
            echo "<script>alert('$imtype');</script>";
            if (!isset($msg)) // If there was no error
            {
            	echo "<script>alert('lala');</script>";
                $data = file_get_contents($_FILES['photo']['tmp_name']);
                $data = mysql_real_escape_string($data);
                // Preparing data to be used in MySQL query

                $sql = "INSERT INTO promociones (fechaInicio,fechaFin,imagen,estatus,Descripcion,totalPonderado,promedio,idAfiliado,idCiudad,idPais,idEstado) 
                			values(STR_TO_DATE('$sd','%Y-%m-%d'),STR_TO_DATE('$ed','%Y-%m-%d'),'$data','waiting','$des','0','0','1','$cit','$coun','$est')";

                mysql_query($sql) or die("Error: ".mysql_error()."<br/>");
                

                echo "<script>alert('lolo');</script>";
                $msg = 'Success: image uploaded';
            }
            echo "<script>alert($msg);</script>";
		}else{
			echo "<script>alert('buuuu');</script>";
		}
		disconnect();
	}

	function deletePromotion($val){
		connect();
		$sql = "DELETE FROM promociones WHERE idPromocion=$val";
		mysql_query($sql);
		disconnect();
	}
	

?>



