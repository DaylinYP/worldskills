<?php 

namespace App\Models;

use CodeIgniter\Model;

class TipoProductoModel extends Model{
    protected $table = "tipo_producto";
    protected $primaryKey = "id_tipo_producto";
    protected $allowedFields = [
        'id_tipo_producto',
        'nombre',
        'descripcion'
    ];
}

?>