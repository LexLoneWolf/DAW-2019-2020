<?php 
    namespace Dwes\Videoclub\Util;
    
    class SoporteYaAlquiladoException extends VideoclubException {
        
        use \Dwes\Videoclub\Util\Logger;

        public function yaAlquilado() : void {
            $this->logWarning("El cliente ya tiene alquilado el soporte: <strong>" . $this->message . "</strong>");
        }
    }
