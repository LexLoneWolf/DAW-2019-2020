<?php 

namespace Dwes\Tienda\Database;

interface ProductoRepository {
    public function getProductos() : ? array;
    public function getProductoPorCod(string $cod);
    public function insert(string $cod, string $nombre, string $nombreCorto,
    string $descripcion, float $pvp, string $familia);
    public function update(string $cod, string $nombre, string $nombreCorto, 
    string $descripcion, float $pvp, string $familia);
    public function delete(string $cod);
}
