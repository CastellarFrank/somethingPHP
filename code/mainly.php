<?php
class mainlyProject{

	public $enlace;
	public $dbName;
	public $localHost;
	public $mainUser;
	public $mainPassword;
	public $myLogin;

	public function mainlyProject($db,$host,$mUser,$mPass){
		$this->dbName=$db;
		$this->localHost=$host;
		$this->mainUser = $mUser;
		$this->mainPassword=$mPass;
		$this->myLogin = new myAuthentication("afiliados");
	}

	public function connect(){
		$this->enlace = mysql_connect($this->localHost,$this->mainUser,$this->mainPassword);
		if(!$this->enlace){
			die('No pudo conectarse: '.mysql_error()."<br/>");
		}
		$result =mysql_query("USE $this->dbName");
		if (!$result) {
			die( 'MySQL Error: ' . mysql_error()."<br/>");
		}
	}

	public function showTables(){
		$result = mysql_query("SHOW TABLES FROM $this->dbName");
		if (!$result) {
			die( "The Database ".$this->dbName." doesn't have tables.<br/>");
		}
		
		while ($row = mysql_fetch_row($result)) {

			if($row[0]=="promociones")
				$link = "#fModal";
			else
				$link="";
			$tableTemp = ucfirst ( $row[0] );
			echo "<div class='widget green icon'><div class='left'><div class='icon'><span class='ico-download'></span></div></div><div class='left'><span id='tableName'>{$tableTemp}</span></div><div class='bottom'><button class='btnTableLeft' onclick='showTable(\"$row[0]\")'>Show Information</button><button class='btnTableRight' href='$link' data-toggle='modal'>Add Data</button></div></div>";
		}
	}
	public function getTablePromotion(){
		echo "<table cellpadding='0' cellspacing='0' width='100%' class='table images lcnp'>";
		
 		$result = mysql_query("SHOW COLUMNS FROM promociones");
  		
  		$cant = mysql_num_rows($result);
  		if($cant==0){
  			die ("The Table doesn't have any field or structure.<br/>");
  		}
			echo "<thead><tr> <th width='30'><input type='checkbox' class='checkall'/></th>";
			$fieldnames=array(); 
			for($i=0;$i<$cant;$i++){
				$row = mysql_fetch_assoc($result);
				echo "<th>{$row['Field']}</th>";
				$fieldnames[] = $row['Field'];
			}
			echo "<th width='80'>Actions</th></tr></thead><tbody>";
			
			mysql_set_charset("UTF8");
			$result = mysql_query("SELECT * FROM promociones");
			
			
			while ($row = mysql_fetch_array($result)) {
				$id = $row['idPromocion'];
				echo "<tr><td><input type='checkbox' name='checkbox'/></td>";
				for($i=0;$i<$cant;$i++){
					if($fieldnames[$i]=="imagen"){
						$valueTemp = base64_encode($row[$fieldnames[$i]]);
						echo "<td><a class='fb' rel='group' href='grids.php?img=$id'><img src='data:image/jpeg;base64, $valueTemp' class='img-polaroid' /></a></td>";
					}else{
						echo "<td>{$row[$fieldnames[$i]]}</td>";	
					}
					
				}
				echo "<td><a href='#' class='button green'><div class='icon'><span class='ico-pencil'></span></div></a><a href='#'' class='button red'><div class='icon'><span class='ico-remove'></span></div></a></td></tr>";
			}
			echo "</tbody></table>";
	}
	public function getImageLink($id){
		$result = mysql_query("SELECT imagen FROM promociones where idPromocion=$id");
		if (mysql_num_rows($result) == 0)
        die('no image');

    	list($data) = mysql_fetch_row($result);

    	header('Content-Length: '.strlen($data));
    	header("Content-type: image/jpeg");
    	echo $data;
    	exit;
	}

	public function showTableData($name){
		if($name=="promociones"){
			$this->getTablepromotion();
			exit;
		}
		echo "<table class='table fpTable lcnp' cellpadding='0' cellspacing='0' width='100%''>";
		
 		$result = mysql_query("SHOW COLUMNS FROM $name"); 
  		
  		$cant = mysql_num_rows($result); 
  		if($cant==0){
  			die ("The Table doesn't have any field or structure.<br/>");
  		}
			echo "<thead><tr> <th><input type='checkbox' class='checkall'/></th>";
			$fieldnames=array(); 
			for($i=0;$i<$cant;$i++){
				$row = mysql_fetch_assoc($result);
				echo "<th>{$row['Field']}</th>";
				$fieldnames[] = $row['Field'];
			}
			echo "<th width='80'>Actions</th></tr></thead><tbody>";
			
			$result = mysql_query("SELECT * FROM $name");
			mysql_set_charset("UTF8");

			$counter=528;
			while ($row = mysql_fetch_array($result)) {
				echo "<tr><td><input type='checkbox' name='order[]'' value='{$counter}'/></td>";
				$counter--;
				for($i=0;$i<$cant;$i++){
					if($fieldnames[$i]=="estatus"){
						echo "<td><span class='label label-important'>{$row[$fieldnames[$i]]}</span></td>";
					}else{
						echo "<td>{$row[$fieldnames[$i]]}</td>";	
					}
					
				}
				echo "<td><a href='#' class='button green'><div class='icon'><span class='ico-pencil'></span></div></a><a href='#'' class='button red'><div class='icon'><span class='ico-remove'></span></div></a></td></tr>";
			}
			echo "</tbody></table>";
	}
	
	public function disconnect(){
		mysql_close($this->enlace);
	}
	public function callLogingUser($user,$pass){
		$this->myLogin->loginUser($user,$pass);
	}

	public function tryToLogUser($user,$pass){
		$result=$this->myLogin->validateUser($user,$pass);
		if($result==0){
			$this->callLogingUser($user,$pass);
			echo "ok";
		}else if($result==1){
			echo "Blank spaces are not allowed.";
		}else{
			echo "Wrong password or username.";
		}
	}
	
	public static function callVerifyLogin(){
		$result=myAuthentication::verifyUserLoged();
		if($result==1){
			header("location:login.php?err=er1");
		}
	}

	public static function callLogOut(){
		myAuthentication::userLogOut();
	}

	public static function getUserLoged(){
		return myAuthentication::getUserLogedName();
	}

	public function sql_safe($s)
	{
	    if (get_magic_quotes_gpc())
	        $s = stripslashes($s);

	    return mysql_real_escape_string($s);
	}

	public function addPromotion($sd,$ed,$cit,$coun,$des){
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
                			values(STR_TO_DATE('$sd','%m/%d/%Y'),STR_TO_DATE('$ed','%m/%d/%Y'),'$data','waiting','$des','0','0','1','$cit','$coun','1')";

                mysql_query($sql) or die("Error: ".mysql_error()."<br/>");
                

                echo "<script>alert('lolo');</script>";
                $msg = 'Success: image uploaded';
            }
            echo "<script>alert($msg);</script>";
		}else{
			echo "<script>alert('buuuu');</script>";
		}

	}
}
?>