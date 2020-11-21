<?php 
    namespace Dwes\Videoclub\Util;

    
    class SoporteNoEncontradoException extends VideoclubException {
        use \Dwes\Videoclub\Util\Logger;

        public function noEncontrado() {
            $this->logWarning("No se ha podido encontrar el soporte " . $this->message .  
            " en los alquileres de este cliente<br />");
        }
    }
