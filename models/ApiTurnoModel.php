<?php 
class ApiTurnoModel{
    private $PDO;

    public function __construct()
    {
        include_once 'config/conex.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getAll()
    {
        $query = $this->PDO->prepare("SELECT * FROM turnos");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getById($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM turnos WHERE id_turno = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getByCancha($id_cancha){
        $query = $this->PDO->prepare("SELECT * FROM turnos WHERE id_cancha = ?");
        $query->execute([$id_cancha]);
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

}