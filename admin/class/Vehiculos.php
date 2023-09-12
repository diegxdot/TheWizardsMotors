<?php
require 'Conexion.php';

class Vehiculos {
    //Atributos
    private $id;
    private $marca;
    private $modelo;
    private $anyo;
    private $km;
    private $precio;
    private $resumen;
    private $imagen;
    const TABLA = 'vehiculos';

    //Constructor
    public function __construct($marca=null,$modelo=null,$anyo=null,$km=null,$precio=null,$resumen=null,$imagen=null,$id=null){
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $anyo;
        $this->km = $km;
        $this->precio = $precio;
        $this->resumen = $resumen;
        $this->imagen = $imagen; 
    }

    //Sección de getters
    public function getId() {
        return $this->id;
    }
    public function getMarca() {
        return $this->marca;
    }
    public function getModelo() {
        return $this->modelo;
    }
    public function getAnyo() {
        return $this->anyo;
    }
    public function getKm() {
        return $this->km;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getResumen() {
        return $this->resumen;
    }
    public function getImagen() {
        return $this->imagen;
    }

    //Seccion de setters
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function setAnyo($anyo) {
        $this->anyo = $anyo;
    }
    public function setKm($km) {
        $this->km = $km;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    public function setResumen($resumen) {
        $this->resumen = $resumen;
    }
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    //Metodo para registros nuevos
    public function guardar() {
        $conexion = new Conexion();
        if ($this->id)/*Modifica si existe un id*/ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . 
            ' SET marca = :marca, modelo = :modelo, anyo = :anyo, km = :km, precio = :precio, resumen = :resumen, imagen = :imagen 
            WHERE id = :id');

            $consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':año', $this->anyo);
            $consulta->bindParam(':km', $this->km);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':resumen', $this->resumen);
            $consulta->bindParam(':imagen', $this->imagen);

            $consulta->execute();
        }else /*Agrega registro nuevo*/ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .
            ' (marca, modelo, anyo, km, precio, resumen, imagen) VALUES(:marca, :modelo, :anyo, :km, :precio, :resumen, :imagen)');

            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':anyo', $this->anyo);
            $consulta->bindParam(':km', $this->km);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':resumen', $this->resumen);
            $consulta->bindParam(':imagen', $this->imagen);
            var_dump($consulta);//Se musetra información de las variables
            var_dump($this->anyo);
			/*var_dump($this->imagen);
            var_dump($this->precio);
            var_dump($this->km);
            
            var_dump($this->modelo);
            var_dump($this->marca);
			exit();//se detiene el script*/
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
            return new self($registro['marca'], $registro['modelo'], $registro['año'], $registro['km'], 
            $registro['precio'], $registro['resumen'], $registro['imagen'], $id);
            
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
}