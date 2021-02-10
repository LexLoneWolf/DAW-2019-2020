<?php 

namespace Dwes\Tienda\Database;

include_once "vendor/autoload.php";

use Psr\Log\LoggerInterface;
use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Database\PDOFactory;
use PDOException;
use PDO;

class PDOProductoRepository implements ProductoRepository {
    
    private $log;

    public function __construct(LoggerInterface $logger) {
        $this->log = $logger;
    }

    public function getProductos() : ? array {

        $conexion = null;
        $productos = [];
        
        try {
            
            $conexion = PDOFactory::getConexion();
            
            $sql = "SELECT prod.*, fam.nombre as nomFamilia 
            FROM producto prod 
            JOIN familia fam 
            ON fam.cod = prod.familia";

            $sentencia = $conexion->prepare($sql);
            $sentencia->setFetchMode(PDO::FETCH_CLASS, Producto::class);
            $sentencia->execute();
            
            while ($fila = $sentencia->fetch()) {
                $productos[] = $fila;
            }    

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $this->log->info("Productos listados correctamente");
        $conexion = null;

        return $productos;
    }

    public function getProductoPorCod(string $cod) {

        $conexion = null;
        $producto = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "SELECT * FROM producto WHERE cod = :cod";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_OBJ);
            $producto = $sentencia->fetch();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = [
            'cod' => $producto->cod, 
            'nombre' => $producto->nombre
        ];
        $this->log->info("Producto cargado correctamente", $datos);

        $conexion = null;

        return $producto;
    }

    public function insert(string $cod, string $nombre,
        string $nombreCorto, string $descripcion, float $pvp, string $familia) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "INSERT INTO producto(cod, nombre, nombre_corto, descripcion, PVP, familia) 
            VALUES (:cod, :nombre, :nombre_corto, :descripcion, :PVP, :familia)";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":nombre_corto", $nombreCorto);
            $sentencia->bindParam(":descripcion", $descripcion);                            
            $sentencia->bindParam(":PVP", $pvp);
            $sentencia->bindParam(":familia", $familia);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = [
            'cod' => $cod,
            'nombre' => $nombre,
            'nombre_corto' => $nombreCorto,
            'descripcion' => $descripcion,
            'pvp' => $pvp,
            'familia' => $familia
        ];
        $this->log->info("Insertado producto:", $datos);

        $conexion = null;
    }

    public function update(string $cod, string $nombre, string $nombreCorto, 
        string $descripcion, float $pvp, string $familia) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
            
            $sql = "UPDATE producto SET
            nombre = :nombre,
            nombre_corto = :nombre_corto,
            descripcion = :descripcion,
            PVP = :pvp,
            familia = :familia
            WHERE cod = :cod";
    
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":nombre_corto", $nombreCorto);
            $sentencia->bindParam(":descripcion", $descripcion);                            
            $sentencia->bindParam(":pvp", $pvp);
            $sentencia->bindParam(":familia", $familia);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = [
            'cod' => $cod,
            'nombre' => $nombre,
            'nombre_corto' => $nombreCorto,
            'descripcion' => $descripcion,
            'pvp' => $pvp
        ];
        $this->log->info("Modificado producto:", $datos);

        $conexion = null;
    }

    public function delete(string $cod) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "DELETE FROM producto WHERE cod = :cod";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());        
        }

        $this->log->info("Eliminado producto:", ['cod' => $cod]);

        $conexion = null;
    }
}