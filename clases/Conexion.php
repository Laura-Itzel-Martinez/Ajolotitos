<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $password="";
		private $bd="ajolotitos";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>