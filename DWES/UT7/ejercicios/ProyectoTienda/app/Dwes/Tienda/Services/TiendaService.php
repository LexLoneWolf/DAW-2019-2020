<?php 

namespace Dwes\Tienda\Services;

use Dwes\Tienda\Database\PDOTiendaRepository;
use Dwes\Tienda\Util\LogFactory;

class TiendaService {

    public function altaTienda(string $nombre, string $tlf) {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        $repositorio->insert($nombre, $tlf);
    }

    public function listarTiendas() : ? array {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        return $repositorio->getTiendas();
    }

    public function cargarTienda(int $id) {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        return $repositorio->getTiendaPorCod($id);
    }

    public function modificarTienda(int $id, string $nombre, string $tlf) {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        $repositorio->update($id, $nombre, $tlf);
    }

    public function eliminarTienda(int $id) {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        $repositorio->delete($id);
    }

    public function altaFranquicia(int $cantTiendas, string $nombre, string $tlf) {
        $repositorio = new PDOTiendaRepository(LogFactory::getLogger());
        $repositorio->insertMultiple($cantTiendas, $nombre, $tlf);
    }
}

