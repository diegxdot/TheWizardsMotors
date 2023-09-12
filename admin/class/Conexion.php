<?php
	class Conexion extends PDO {
		//Se indica que la clase Conexión hereda de la clase PDO
		private $db_type = 'mysql'; //Indica el tipo de servidor de base de datos en este caso mysql
		private $host = 'localhost';//Se define el nombre del servidor, se va a trabajar de forma local
		private $db_name = 'wizards';//Coloca el nombre de la base de datos
		private $user = 'root';//Se coloca el nombre del usuario del servidor con el que se conecta
		private $pass = '';//coloca la contraseña, si no tiene, dejar comillas simples como en este	ejemplo y si tiene se debe colocar
		
		public function __construct() { //Se declara la función construtor
			try {
				parent::__construct($this->db_type . ':host=' .
				$this->host . ';dbname=' . $this->db_name,
				$this->user, $this->pass);//se llama el constructor de la clase padre y se mandan los 		parámetros para que pueda conectar con el servidor
				//echo "Éxito al conectar";//mensaje éxito
			}catch (PDOException $e) {
				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: '.$e->getMessage();
				exit;
			}//Cierre del catch
		}//Cierre del constructor
	}//Cierre de la clase