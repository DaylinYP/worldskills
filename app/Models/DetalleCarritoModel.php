<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleCarritoModel extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id_detalle";
    protected $allowedFields = [
        'id_carrito',
        'id_producto',
        'cantidad_compra',
        'precio',
        'subtotal'
    ];
}
