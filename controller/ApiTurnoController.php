<?php
require_once "models/ApiTurnoModel.php";
require_once "view/json.view.php";

class ApiTurnoController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ApiTurnoModel();
        $this->view = new JSONView();
    }

    //pbtiene todos los turnos
    public function getAllTurnos($req, $res)
    {
        $turnos =  $this->model->getAll();
        $this->view->response($turnos, 200);
    }

    //obtiene turnos por id
    public function getTurnoByID($req, $res)
    {
        $id = $req->params->id_turno;
        $turno = $this->model->getById($id);
        if ($turno) {
            $this->view->response($turno, 200);
        } else {
            $this->view->response("el turno con el id= $id  no se encuentra", 404);
        }
    }

    public function getTurnoByCancha($req, $res){
        $id_cancha = $req->params->id_cancha;
        $turnos = $this->model->getByCancha($id_cancha);
        if ($turnos) {
            $this->view->response($turnos, 200);
        } else {
            $this->view->response("los turnos de la cancha con el id= $id_cancha  no se encuentra", 404);
        }

    }

    public function createTurno ($req, $res){
        $cancha = $req->body->cancha;
        $fecha = $req->body->fecha;
        $horario=$req->body->horario;
        $estado =$req->body->estado;

        if (empty($cancha) || empty($fecha) || empty($horario) || empty($estado)){
            $this->view->response("faltan datos para crear el turno", 404);}
        else{
            $newTurno= $this->model->createTurno($cancha, $fecha, $horario, $estado);
            if(!empty($newCancha)){
            $this->view->response("el turno fue creada con exito", 201);
            }else{
            $this->view->response("el turno no se pudo crear", 404);
            }
        }

    }

}
