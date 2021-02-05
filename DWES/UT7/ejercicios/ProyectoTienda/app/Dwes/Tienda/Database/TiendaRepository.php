<?php 

namespace Dwes\Tienda\Database;

interface TiendaRepository {
    public function getTiendas() : ? array;
    public function getTiendaPorCod(int $id);
    public function insert(string $nombre, string $tlf);
    public function update(int $id, string $nombre, string $tlf);
    public function delete(int $id);
}

