<?php 
require_once "models/ApicanchaModel.php";
require_once "view/json.view.php";

class ApiCanchaController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new ApiCanchaModel();
        $this->view = new JSONView();

    }

    public function getAll($req, $res)
    {
        $canchas =  $this->model->getAll();
        $this->view->response($canchas);
    }


}