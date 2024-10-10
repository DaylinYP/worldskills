<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController
{
    protected $modelName = "App\Models\UsuariosModel";
    protected $format = "json";

    public function index()
    {
        $usuarios = $this->model->findAll();
        return $this->respond($usuarios);
    }
    public function show($id_usuario = null)
    {
        $usuarios = $this->model->find($id_usuario);
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
    public function update($id_usuarios = null)
    {
        $usuarios = $this->model->find($id_usuarios);
        if (!$usuarios) {
            return $this->failNotFound( "Producto no se puede actualizar, verifique datos");
        }
        $datos = $this->request->getJSON(true);
        if ($this->model->update($id_usuarios, $datos)) {
            return $this->respondUpdated($datos, "Producto actualizado");
        }
        return $this->failNotFound("Producto no se encontrado");
    }
    public function delete($id_usuarios = null)
    {
        if ($this->model->find($id_usuarios)) {
            $this->model->delete($id_usuarios);
            return $this->respondDeleted(["id" => $id_usuarios], "Producto eliminado");
        }
        return $this->failNotFound("Producto no se puede eliminar");
    }
    
}
