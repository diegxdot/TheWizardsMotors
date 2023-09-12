<?php
require 'Conexion.php';

class Usuarios {
	//Atributos
	private $id;
    private $curp;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
	private $correo;
	private $contrasena;
	private $estatus;
	private $privilegios;
	const TABLA = 'usuarios';

	//Constructor
	public function __construct($curp=null,$nombre=null,$apellidoP=null,$apellidoM=null,$correo=null,$contrasena=null,$estatus=null,$privilegios=null,$id=null) {
		$this->curp = $curp;
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
        $this->correo = $correo;
		$this->contrasena = $contrasena;
		$this->estatus = $estatus;
		$this->privilegios = $privilegios;
		$this->id = $id;
	}

	//seccion de getters
	public function getId() {
		return $this->id;
	}
    public function getCurp() {
        return $this->curp;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellidoP() {
        return $this->apellidoP;
    }
    public function getApellidoM() {
        return $this->apellidoM;
    }
	public function getCorreo() {
		return $this->correo;
	}
	public function getContrasena() {
		return $this->contrasena;
	}
	public function getEstatus() {
		return $this->estatus;
	}
	public function getPrivilegios() {
		return $this->privilegios;
	}
	
	//Seccion de setters
    public function setCurp($curp) {
        $this->curp = $curp;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }
    public function setApellidoM($apellidoM) {
        $this->apellidoM = $apellidoM;
    }
	public function setCorreo($correo) {
		$this->email = $correo;
	}
	public function setContrasena($contrasena) {
		$this->password = $contrasena;
	}
	public function setEstatus($estatus) {
		$this->estatus = $estatus;
	}
	public function setPrivilegios($privilegios) {
		$this->privilegios = $privilegios;
	}

	//Metodo que sirve para guardar un registro nuevo o actualizar uno existente
	public function guardar() {
		$conexion = new Conexion();
		if ($this->id) /* Modifica un registro existente si se recibe un id*/ {
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA .
			' SET curp = :curp, nombre = :nombre, apellidoP = :apellidoP, apellidoM = :apellidoM, correo = :correo, contrasena = :contrasena, 
            estatus = :estatus, privilegios = :privilegios WHERE id = :id');
			// var_dump($consulta);
			// echo "<br>";
			// var_dump($this);
			// exit();
			$consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':curp', $this->curp);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellidoP', $this->apellidoP);
            $consulta->bindParam(':apellidoM', $this->apellidoM);
			$consulta->bindParam(':correo', $this->email);
			$consulta->bindParam(':contrasena', $this->password);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':privilegios', $this->privilegios);

			$consulta->execute();
		} else /* Inserta un registro nuevo */ {
			$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .
			' (curp, nombre, apellidoP, apellidoM, correo, contrasena, estatus, privilegios)
			VALUES(:curp, :nombre, :apellidoP, :apellidoM, :correo, :contrasena, :estatus, :privilegios)');
			$consulta->bindParam(':curp', $this->curp);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellidoP', $this->apellidoP);
            $consulta->bindParam(':apellidoM', $this->apellidoM);
			$consulta->bindParam(':correo', $this->email);
			$consulta->bindParam(':contrasena', $this->password);
			$consulta->bindParam(':estatus', $this->estatus);
			$consulta->bindParam(':privilegios', $this->privilegios);

			$consulta->execute();
			$this->id = $conexion->lastInsertId();
		}
		$conexion = null;
	}

	//Eliminar un registro de la tabla
	public function eliminar(){
        echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $this->id);
        $consulta->execute();
        $conexion = null;
    }

    //Busca un registro de la tabla usando el id de ese registro
    public static function buscarPorId($id) {        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        //print_r($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['curp'], $registro['nombre'], $registro['apellidoP'], $registro['apellidoM'], 
            $registro['correo'], $registro['contrasena'], $registro['estatus'], $registro['privilegios'], $id);
            
        } else {
            return false;            
        }
    }

    //Listar todos los registros de la tabla
    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        // var_dump($consulta);
        // echo "<br>";
        // var_dump($registros);
        // exit();
        return $registros;
    }



	/* Método que permite a un usuario iniciar sesión en el sitio */
	public function logIn(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT correo, privilegios FROM ' . self::TABLA .
		' WHERE correo = :correo and contrasena = :contrasena');
		$consulta->bindParam(':correo', $this->email);
		$consulta->bindParam(':contrasena', $this->password);
		$consulta->execute();
		$registro = $consulta->fetch();
		if ($registro) {
			$_SESSION['correo'] = $registro[0];
			$_SESSION['privilegios'] = $registro[2];
			return true;
		} else {
			return false;	
		}
		$conexion = null;
	}//Fin login
}