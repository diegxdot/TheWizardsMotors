<?php
require 'Conexion.php';

class Comentarios {
    //Atributos
    private $id;
    private $idU;
    private $asunto;
    private $comentario;
    const TABLA = 'comentarios';

    //Constructor
    public function __construct($idU=null,$asunto=null,$comentario=null,$id=null){
        $this->id = $id;
        $this->idU = $idU;
        $this->asunto = $asunto;
        $this->comentario = $comentario;
    }

    //Sección de getters
    public function getId() {
        return $this->id;
    }
    public function getIdU() {
        return $this->idU;
    }
    public function getAsunto() {
        return $this->asunto;
    }
    public function getComentario() {
        return $this->comentario;
    }

    //Sección de setters
    public function setIdU($idU) {
        $this->idU =$idU ;
    }
    public function setAsunto($asunto) {
        $this->asunto = $asunto;
    }
    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    //Metodo para agregar nuevo registro
    public function guardar() {
        $conexion = new Conexion();
        if($this->id) /*Modifica si existe la id*/ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .
            ' SET idU = :idU, asunto = :asunto, comentario = :comentario WHERE id = :id');

            $consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':idU', $this->idU);
            $consulta->bindParam(':asunto', $this->asunto);
            $consulta->bindParam(':comentario', $this->comentario);

            $consulta->execute();
        }else /*Agrega nuevo registro*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .
            ' (idU, asunto, comentario) VALUES(:idU, :asunto, :comentario)');
            $consulta->bindParam(':idU', $this->idU);
            $consulta->bindParam(':asunto', $this->asunto);
            $consulta->bindParam(':comentario', $this->comentario);
            $consulta->execute();
			$this->id = $conexion->lastInsertId();
        }
        $conexion=null;
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
            return new self($registro['idU'], $registro['asunto'], $registro['comentario'], $id);
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