<?php

class ApiCanchaModel
{
    private $PDO;

    public function __construct()
    {
        include_once 'config/conex.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getAll()
    {
        $query = $this->PDO->prepare("SELECT * FROM canchas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM canchas WHERE id_cancha = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function createCancha($tipo_cesped, $precio, $imagen, $techada){
        $query = $this->PDO->prepare("INSERT INTO canchas ( tipo_cesped, imagen, precio, techada) VALUES (?,?,?,?)");
        $query->execute([$tipo_cesped, $imagen,  $precio,  $techada]);
        return $this->PDO->lastInsertId();


    }
}
