<?php 

namespace Dwes\Tienda;

use Illuminate\Database\Eloquent\Model;

class TiendaModel extends Model {

    protected $table = 'tienda';
    protected $primaryKey = 'cod';
    protected $fillable = ['nombre', 'tlf'];
    public $timestamps = false;
}
