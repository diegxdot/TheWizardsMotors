<?php
require 'Conexion.php';

class Preventa {
    //Atributos
    private $id;
    private $curp;
    private $vehiculo;
    private $pagado;
    private $abonado;
    const TABLA = 'preventa';

    //Constructor
    public function __construct($curp=null,$vehiculo=null,$pagado=null,$abonado=null,$id=null) {
        $this->id = $id;
        $this->curp = $curp;
        $this->vehiculo = $vehiculo;
        $this->pagado = $pagado;
        $this->abonado = $abonado;
    }

    //Sección de getters
    public function getId(){
        return $this->id;
    }
    public function getCurp(){
        return $this->curp;
    }
    public function getVehiculo(){
        return $this->vehiculo;
    }
    public function getPagado(){
        return $this->pagado;
    }
    public function getAbonado(){
        return $this->abonado;
    }

    //Sección de setters
    public function setCurp($curp){
        $this->curp = $curp;
    }
    public function setVehiculo($vehiculo){
        $this->vehiculo = $vehiculo;
    }
    public function setPagado($pagado){
        $this->pagado = $pagado;
    }
    public function setAbonado($abonado){
        $this->abonado = $abonado;
    }

    //Metodo para realizar registros nuevos
    public function guardar() {
        $conexion = new Conexion();
        if($this->id)/*Si detecta un id similar modifica*/ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .
            ' SET curp = :curp, vehiculo = :vehiculo, pagado = :pagado, abonado = :abonado WHERE id = :id');

            $consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':curp', $this->curp);
            $consulta->bindParam(':vehiculo', $this->vehiculo);
            $consulta->bindParam(':pagado', $this->pagado);
            $consulta->bindParam(':abonado', $this->abonado);

            $consulta->execute();
        }else /*Si el id es nuevo agrega*/ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .
            ' (curp, vehiculo, pagado, abonado) VALUES (:curp, :vehiculo, :pagado, :abonado)');

            $consulta->bindParam(':curp', $this->curp);
            $consulta->bindParam(':vehiculo', $this->vehiculo);
            $consulta->bindParam(':pagado', $this->pagado);
            $consulta->bindParam(':abonado', $this->abonado);

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
}