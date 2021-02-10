<?php 

namespace Dwes\Tienda;

use Illuminate\Database\Eloquent\Model;

class FamiliaModel extends Model {

    protected $table = 'familia';
    protected $primaryKey = 'cod';
    protected $fillable = ['cod', 'nombre'];
    protected $keyType = "string";
    public $timestamps = false;
}
