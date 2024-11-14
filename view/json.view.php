<?php 
class JSONView{
    public function response($body, $status = 200){
        header("content-type: application/json");
        $mensaje_estados = $this->_requestStatus($status);
        header("HTTP/1.1  $status $mensaje_estados");
        echo json_encode($body);
    }

    private function _requestStatus($codigo){
        $status   = array(
            200 => "ok",
            201 => "created",
            204 => "no content",
            400 => "bad request",
            404 => "not found",
            500 => "internal server error",

        );
        return (isset($status[$codigo])) ? $status[$codigo] : $status[500];
    }
}
