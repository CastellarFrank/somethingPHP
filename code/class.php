<?php
	class usuarios{

		public $email;
		public $name;
		public $fecha;
		public $sexo;
		public $sueldo;

		public function usuarios(){
			echo "Hola a todos";
		}
		public function changeAll($e,$n,$d,$f,$s,$su){
			$this->email = $e;
			$this->name = $n;
			$this->fecha = $f;
			$this->sexo = $s;
			$this->sueldo = $su;
			return $this;
		}

		public function changeName($na){
			$this->name = $na;
			return $this;
		}
	}

	class mainlyProject{

		public $enlace;
		public $dbName = "testingDb";

		public function connect($v = null){
			$this->enlace = mysql_connect('localhost','root','siniestro');
			if(!$this->enlace){
				$this->cantConnectMessage();
			}else if(!$v){
				echo "Connected to Database <a href='main.php?tables=1'>See Tables</a><br/>";
			}
		}

		public function cantConnectMessage(){
			echo "Can't connect to Database <a href= 'main.php'>Retry</a><br/>";
		}
		public function showTables(){

			$result = mysql_query("SHOW TABLES FROM $this->dbName");

			if (!$result) {
    			echo 'MySQL Error: ' . mysql_error()."<br/>";
    			exit;
			}
			while ($row = mysql_fetch_row($result)) {
    			echo "<div class='widget green icon'><div class='left'><div class='icon'><span class='ico-download'></span></div></div><div class='left'>Table: $row[0]</div><div class='bottom'><button class='btnTableLeft' onclick='showTable(\"$row[0]\")'>Show Information</button><button class='btnTableRight'>Add Data</button></div></div>";
			}
		}

		public function showTableData($name){

			$result =mysql_query("USE $this->dbName");
			if (!$result) {
    			echo 'MySQL Error: ' . mysql_error()."<br/>";
    			exit;
			}
			echo "<table cellpadding='0' cellspacing='0' width='100%' class='table lcnp'>";
			
     		$result = mysql_query("SHOW COLUMNS FROM $name"); 
      		if (!$result) { 
        		echo 'MySQL Error: ' . mysql_error(); 
        		exit;
      		}
      		$cant = mysql_num_rows($result); 
      		if($cant==0){
      			echo "The Table doesn't have any field or structure.";
      		}else{
      			echo "<thead><tr> <th width='16'><input type='checkbox' class='checkall'/></th>";
      			$fieldnames=array(); 
      			for($i=0;$i<$cant;$i++){
      				$row = mysql_fetch_assoc($result);
      				echo "<th>{$row['Field']}</th>";
      				$fieldnames[] = $row['Field'];
      			}
      			echo "<th width='78'>Actions</th></tr></thead><tbody>";
      			
      			$result = mysql_query("SELECT * FROM $name");
      			
      			while ($row = mysql_fetch_array($result)) {
      				echo "<tr><td><input type='checkbox' name='checkbox'/></td>";
      				for($i=0;$i<$cant;$i++){
      					echo "<td>{$row[$fieldnames[$i]]}</td>";
      				}
      				echo "<td><a href='#' class='button green'><div class='icon'><span class='ico-pencil'></span></div></a><a href='#' class='button red'><div class='icon'><span class='ico-remove'></span></div></a></td></tr>";
      			}
      			echo "</tbody></table>";
      		}
		}
		public function disconnect(){
			mysql_close($this->enlace);
		}
	}
?>