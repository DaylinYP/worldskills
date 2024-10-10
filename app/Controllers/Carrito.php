<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Carrito extends ResourceController{
    protected $modelName = "App\Models\CarritoModel";
    protected $format = "json";

    public function index(){
        $productos = $this->model->findAll();
        return $this->respond($productos);
    }
    public function show($id_carrito = null){
        $productos = $this->model->find($id_carrito);
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
    public function update($id_carrito = null){
        $productos = $this->model->find($id_carrito);
        if(!$productos){
            return $this->failNotFound(description: "Producto no se puede almacenar");
        }
        $datos  = $this->request->getJSON(true);
        if($this->model->update($datos)){
            return $this->respondUpdated($datos, "Producto almacenado");
        }
        return $this->failNotFound("Producto no se puede almacenar");
    }    
    public function delete($id_carrito = null){
        if($this->model->find($id_carrito)){
            $this->model->delete($id_carrito);
            return $this->respondDeleted(["id" => $id_carrito],"Producto eliminado");
        }
        return $this->failNotFound("producto no se puede eliminar");
    }
}


?>