<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class TipoProducto extends ResourceController{
    protected $modelName = "App\Models\TipoProductoModel";
    protected $format = "json";

    public function index(){
        $productos = $this->model->findAll();
        return $this->respond($productos);
    }
    public function show($id_tipo_producto = null){
        $productos = $this->model->find($id_tipo_producto);
        if($productos){
            return $this->respond($productos);
        }
        return $this->failNotFound("Producto no encontrado");
    }
    public function create(){
        $datos  = $this->request->getJSON(true);
        if($this->model->insert($datos)){
            return $this->respondCreated($datos, "Producto almacenado");
        }
        return $this->failNotFound("Producto no se puede almacenar");
    }
    public function update($id_tipo_producto = null){
        $productos = $this->model->find($id_tipo_producto);
        if(!$productos){
            return $this->failNotFound(description: "Producto no se puede almacenar");
        }
        $datos  = $this->request->getJSON(true);
        if($this->model->update($datos)){
            return $this->respondUpdated($datos, "Producto almacenado");
        }
        return $this->failNotFound("Producto no se puede almacenar");
    }    
    public function delete($id_tipo_producto = null){
        if($this->model->find($id_tipo_producto)){
            $this->model->delete($id_tipo_producto);
            return $this->respondDeleted(["id" => $id_tipo_producto],"Producto eliminado");
        }
        return $this->failNotFound("producto no se puede eliminar");
    }
}


?>