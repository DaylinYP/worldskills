<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class DetalleCarrito extends ResourceController
{
    protected $modelName = "App\Models\DetalleCarritoModel";
    protected $format = "json";

    public function index()
    {
        $usuarios = $this->model->findAll();
        return $this->respond($usuarios);
    }
    public function show($id_detalle = null)
    {
        $usuarios = $this->model->find($id_detalle);
        if ($usuarios) {
            return $this->respond($usuarios);
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
    public function update($id_detalle = null)
    {
        $usuarios = $this->model->find($id_detalle);
        if (!$usuarios) {
            return $this->failNotFound( "Producto no se puede actualizar, verifique datos");
        }
        $datos = $this->request->getJSON(true);
        if ($this->model->update($id_detalle, $datos)) {
            return $this->respondUpdated($datos, "Producto actualizado");
        }
        return $this->failNotFound("Producto no se encontrado");
    }
    public function delete($id_detalle = null)
    {
        if ($this->model->find($id_detalle)) {
            $this->model->delete($id_detalle);
            return $this->respondDeleted(["id" => $id_detalle], "Producto eliminado");
        }
        return $this->failNotFound("Producto no se puede eliminar");
    }
    
}
