<?php
require_once "models/ApicanchaModel.php";
require_once "view/json.view.php";

class ApiCanchaController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ApiCanchaModel();
        $this->view = new JSONView();
    }

    public function getAll($req, $res)
    {
        $canchas =  $this->model->getAll();
        $this->view->response($canchas, 200);
    }
    public function getCanchaByID($req, $res)
    {
        $id = $req->params->id_cancha;
        $cancha = $this->model->getById($id);
        if ($cancha) {
            $this->view->response($cancha, 200);
        } else {
            $this->view->response("La cancha con el id= $id  no se encuentra", 404);
        }
    }

    public function createCancha($req, $res){
        
        
        $tipo_cesped = $req->body['tipo_cesped'];
        $precio = $req->body['precio'];
        $imagen = $req->body['imagen'];
        $techada = $req->body['techada'];
        

        if (empty($tipo_cesped) || empty($precio) || empty($imagen) || empty($techada)){
            $this->view->response("faltan datos para crear la cancha", 404);
        }else{
            $newCancha= $this->model->createCancha($tipo_cesped, $precio, $imagen, $techada);
            if(!empty($newCancha)){
            $this->view->response("La cancha fue creada con exito", 201);
            }
        }
       
    }
}
