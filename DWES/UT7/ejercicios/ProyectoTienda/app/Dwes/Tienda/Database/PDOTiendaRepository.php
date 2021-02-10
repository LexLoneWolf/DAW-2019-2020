<?php 

namespace Dwes\Tienda\Database;

include_once "vendor/autoload.php";

use Psr\Log\LoggerInterface;
use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Database\PDOFactory;
use PDOException;
use PDO;

class PDOTiendaRepository implements TiendaRepository {
    
    private $log;

    public function __construct(LoggerInterface $logger) {
        $this->log = $logger;
    }

    public function getTiendas() : ? array {

        $conexion = null;
        $tiendas = [];
        
        try {
            
            $conexion = PDOFactory::getConexion();
            
            $sql = "SELECT * FROM tienda";
            $sentencia = $conexion->prepare($sql);
            $sentencia->setFetchMode(PDO::FETCH_CLASS, Tienda::class);
            $sentencia->execute();
            
    
            while ($fila = $sentencia->fetch()) {
                $tiendas[] = $fila;
            }    
        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $this->log->info("Tiendas listadas correctamente");
        $conexion = null;

        return $tiendas;
    }

    public function getTiendaPorCod(int $id) {

        $conexion = null;
        $tienda = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "SELECT * FROM tienda WHERE cod = :id";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_OBJ);
            $tienda = $sentencia->fetch();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = [
            'cod' => $tienda->cod, 
            'nombre' => $tienda->nombre, 
            'tlf' => $tienda->tlf];
        $this->log->info("Tienda cargada correctamente", $datos);

        $conexion = null;

        return $tienda;
    }

    public function insert(string $nombre, string $tlf) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();

            $sql = "INSERT INTO tienda(nombre,tlf) VALUES (:nombre, :tlf)";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":tlf", $tlf);
            $sentencia->execute();

            $id = $conexion->lastInsertId();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = ['cod' => $id, 'nombre' => $nombre, 'tlf' => $tlf];
        $this->log->info("Modificada tienda:", $datos);

        $conexion = null;
    }

    public function update(int $id, string $nombre, string $tlf) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
            
            $sql = "UPDATE tienda SET nombre = :nombre, tlf = :tlf WHERE cod = :id";
    
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":tlf", $tlf);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = ['cod' => $id, 'nombre' => $nombre, 'tlf' => $tlf];
        $this->log->info("Insertada tienda:", $datos);

        $conexion = null;
    }

    public function delete(int $id) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "DELETE FROM tienda WHERE cod = :id";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());        
        }

        $this->log->info("Borrada tienda:", ['cod' => $id]);

        $conexion = null;
    }

    public function insertMultiple(int $cantTiendas, string $nombre, string $tlf) {

        $conexion = PDOFactory::getConexion();
        try {
            $conexion->beginTransaction();

            for ($i=0; $i < $cantTiendas; $i++) { 

                $nombreTienda = $nombre . $i;

                if ($i > 0) {
                   $tlf = null;
                }

                $sql = "INSERT INTO tienda(nombre,tlf) VALUES (:nombre, :tlf)";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":nombre", $nombreTienda);
                $sentencia->bindParam(":tlf", $tlf);
                $sentencia->execute();
            }

            $conexion->commit();
        } catch (PDOException $e) {
            $conexion->rollBack();
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());  
        }
        $conexion = null;
    }
}