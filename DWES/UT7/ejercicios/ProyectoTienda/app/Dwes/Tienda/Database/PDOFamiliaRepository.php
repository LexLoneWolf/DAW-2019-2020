<?php 

namespace Dwes\Tienda\Database;

include_once "vendor/autoload.php";

use Psr\Log\LoggerInterface;
use Dwes\Tienda\Util\TiendaException;
use Dwes\Tienda\Database\PDOFactory;
use PDOException;
use PDO;

class PDOFamiliaRepository implements FamiliaRepository {
    
    private $log;

    public function __construct(LoggerInterface $logger) {
        $this->log = $logger;
    }

    public function getFamilias() : ? array {

        $conexion = null;
        $familias = [];
        
        try {
            
            $conexion = PDOFactory::getConexion();
            
            $sql = "SELECT * FROM familia";
            $sentencia = $conexion->prepare($sql);
            $sentencia->setFetchMode(PDO::FETCH_CLASS, Familia::class);
            $sentencia->execute();
            
            while ($fila = $sentencia->fetch()) {
                $familias[] = $fila;
            }    
        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $this->log->info("Familias listadas correctamente");
        $conexion = null;

        return $familias;
    }

    public function getFamiliaPorCod(string $cod) {

        $conexion = null;
        $familia = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "SELECT * FROM familia WHERE cod = :cod";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_OBJ);
            $familia = $sentencia->fetch();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = [
            'cod' => $familia->cod, 
            'nombre' => $familia->nombre
        ];
        $this->log->info("Familia cargada correctamente", $datos);

        $conexion = null;

        return $familia;
    }

    public function insert(string $cod, string $nombre) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();

            $sql = "INSERT INTO familia(cod, nombre) VALUES (:cod, :nombre)";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = ['cod' => $cod, 'nombre' => $nombre];
        $this->log->info("Insertada familia:", $datos);

        $conexion = null;
    }

    public function update(string $cod, string $nombre) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
            
            $sql = "UPDATE familia SET nombre = :nombre WHERE cod = :cod";
    
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());
        }

        $datos = ['cod' => $cod, 'nombre' => $nombre];
        $this->log->info("Modificada familia:", $datos);

        $conexion = null;
    }

    public function delete(string $cod) {

        $conexion = null;

        try {
            $conexion = PDOFactory::getConexion();
    
            $sql = "DELETE FROM familia WHERE cod = :cod";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":cod", $cod);
            $sentencia->execute();

        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            throw new TiendaException($e->getMessage());        
        }

        $this->log->info("Borrada familia:", ['cod' => $cod]);

        $conexion = null;
    }
}