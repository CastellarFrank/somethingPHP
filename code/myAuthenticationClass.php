<?php
	class myAuthentication{
		
		public $tbl_name;

		public function myAuthentication($tbName){
			$this->tbl_name=$tbName;
		}

		public function validateUser($user, $pass){
			if(!$user || !$pass)
				return 1; //si algo de ellos está vacio
			$myusername=$user; 
			$mypassword=$pass; 
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = mysql_real_escape_string($myusername);
			$mypassword = mysql_real_escape_string($mypassword);
			$sql="SELECT * FROM $this->tbl_name WHERE email='$myusername' and password='$mypassword'";
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);
			if($count==1){
				return 0; //0 Si es correcto.
			}else{
				return 2; //2 si no es correcta ya sea el usuario o el pass
			}
		}

		public function loginUser($user,$pass){
			session_start();
			$_SESSION["myusername"]=$user; 
			$_SESSION["mypassword"]=$pass; 
			$_SESSION["userType"]= $this->getUserType($user);
			session_write_close();
		}

		public function getUserLogedType(){
			$session_start();
			$st=$_SESSION["userType"];
			$session_write_close();
			return $st;
		}

		public static function getUserLogedName(){
			
			$session_start();
			$lt=$_SESSION["myusername"];
			$sql="SELECT nombre from afiliados where email=$lt";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			$session_write_close();
			return $row[0];

		}

		public function getUserType($user){
			$sql="SELECT  idRaiz FROM $this->tbl_name WHERE email='$user'";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			return $row[0];
		}


		public static function verifyUserLoged(){
			session_start();
			$val = 1; // No está logueado
			if(isset($_SESSION["myusername"])){
				$val=0; //0 Si está logueado.
			}
			session_write_close();
			return $val;
		}

		public static function userLogOut(){
			session_start();
			session_destroy();
		}

	}
?>