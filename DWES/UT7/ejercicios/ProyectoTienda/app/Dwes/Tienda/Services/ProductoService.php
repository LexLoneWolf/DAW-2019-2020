<?php 

namespace Dwes\Tienda\Services;

use Dwes\Tienda\Database\PDOProductoRepository;
use Dwes\Tienda\Util\LogFactory;

class ProductoService {

    public function altaProducto(string $cod, string $nombre, string $nombreCorto,
        string $descripcion, float $pvp, string $familia) {
        $repositorio = new PDOProductoRepository(LogFactory::getLogger());
        $repositorio->insert($cod, $nombre, $nombreCorto, $descripcion, $pvp, $familia);
    }

    public function listarProductos() : ? array {
        $repositorio = new PDOProductoRepository(LogFactory::getLogger());
        return $repositorio->getProductos();
    }

    public function cargarProducto(string $cod) {
        $repositorio = new PDOProductoRepository(LogFactory::getLogger());
        return $repositorio->getProductoPorCod($cod);
    }

    public function modificarProducto(string $cod, string $nombre,
        string $nombreCorto, string $descripcion, float $pvp, string $familia) {
        $repositorio = new PDOProductoRepository(LogFactory::getLogger());
        $repositorio->update($cod, $nombre, $nombreCorto, $descripcion, $pvp, $familia);
    }

    public function eliminarProducto(string $cod) {
        $repositorio = new PDOProductoRepository(LogFactory::getLogger());
        $repositorio->delete($cod);
    }
}