<?php 

namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model{
    protected $table = "carrito";
    protected $primaryKey = "id_carrito";
    protected $allowedFields = [
        'id_carrito',
        'id_usuario',
        'fecha_creacion',
        'fecha_actualizacion'
    ];
}

?>