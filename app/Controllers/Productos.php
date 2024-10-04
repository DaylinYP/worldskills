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
    public function show($id = null)
    {
        $productos = $this->model->find($id);
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
    public function update($id = null)
    {
        $productos = $this->model->find($id);
        if (!$productos) {
            return $this->failNotFound( "Producto no se puede actualizar, verifique datos");
        }
        $datos = $this->request->getJSON(true);
        if ($this->model->update($id, $datos)) {
            return $this->respondUpdated($datos, "Producto actualizado");
        }
        return $this->failNotFound("Producto no se encontrado");
    }
    public function delete($id = null ){
        $datos = $this->request->getJSON(true);
        if ($this->model->delete($datos)) {
            return $this->respondDeleted($datos, "Producto eliminado");
        }
        return $this->failNotFound(description: "Producto no se puede eliminar");
 
    }
}
