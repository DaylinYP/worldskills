<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table = "usuario";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = [
        'nombre',
        'apellido',
        'correo_electronico',
        'contrasenia'    ];
}

?>