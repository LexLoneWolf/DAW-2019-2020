<?php 

namespace Dwes\Tienda\Services;

use Dwes\Tienda\Database\PDOFamiliaRepository;
use Dwes\Tienda\Util\LogFactory;

class FamiliaService {

    public function altaFamilia(string $cod, string $nombre) {
        $repositorio = new PDOFamiliaRepository(LogFactory::getLogger());
        $repositorio->insert($cod, $nombre);
    }

    public function listarFamilias() : ? array {
        $repositorio = new PDOFamiliaRepository(LogFactory::getLogger());
        return $repositorio->getFamilias();
    }

    public function cargarFamilia(string $cod) {
        $repositorio = new PDOFamiliaRepository(LogFactory::getLogger());
        return $repositorio->getFamiliaPorCod($cod);
    }

    public function modificarFamilia(string $cod, string $nombre) {
        $repositorio = new PDOFamiliaRepository(LogFactory::getLogger());
        $repositorio->update($cod, $nombre);
    }

    public function eliminarFamilia(string $cod) {
        $repositorio = new PDOFamiliaRepository(LogFactory::getLogger());
        $repositorio->delete($cod);
    }
}

