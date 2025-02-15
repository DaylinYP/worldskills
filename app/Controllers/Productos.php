<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Productos extends ResourceController
{
    protected $modelName = "App\Models\ProductosModel";
    protected $format = "json";

    public function index()
    {
        $productos = $this->model->findAll();
        return $this->respond($productos);
    }
    public function show($id_producto = null)
    {
        $productos = $this->model->find($id_producto);
        if ($productos) {
            return $this->respond($productos);
        }
        return $this->failNotFound(description: "Producto no encontrado");
    }
    public function create()
    {
        $datos = $this->request->getJSON(true);
        if ($this->model->insert($datos)) {
            return $this->respondCreated($datos, "Producto almacenado");
        }
        return $this->failNotFound(description: "Producto no se puede almacenar");
    }
    public function update($id_producto = null)
    {
        $productos = $this->model->find($id_producto);
        if (!$productos) {
            return $this->failNotFound( "Producto no se puede actualizar, verifique datos");
        }
        $datos = $this->request->getJSON(true);
        if ($this->model->update($id_producto, $datos)) {
            return $this->respondUpdated($datos, "Producto actualizado");
        }
        return $this->failNotFound("Producto no se encontrado");
    }
    public function delete($id_producto = null)
    {
        if ($this->model->find($id_producto)) {
            $this->model->delete($id_producto);
            return $this->respondDeleted(["id" => $id_producto], "Producto eliminado");
        }
        return $this->failNotFound("Producto no se puede eliminar");
    }
    
}
