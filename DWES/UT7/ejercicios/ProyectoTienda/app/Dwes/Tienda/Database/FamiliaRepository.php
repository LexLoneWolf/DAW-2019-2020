<?php 

namespace Dwes\Tienda\Database;

interface FamiliaRepository {
    public function getFamilias() : ? array;
    public function getFamiliaPorCod(string $cod);
    public function insert(string $cod, string $nombre);
    public function update(string $cod, string $nombre);
    public function delete(string $cod);
}
