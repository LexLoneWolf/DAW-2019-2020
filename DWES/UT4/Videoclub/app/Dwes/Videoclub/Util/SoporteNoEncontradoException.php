<?php 
    namespace Dwes\Videoclub\Util;

    class SoporteNoEncontradoException extends VideoclubException {
        use \Dwes\Videoclub\Util\Logger;

        public function soporteNoEncontrado() : void {
            $this->logError("No se ha podido encontrar el soporte " . $this->message .  
            " en los alquileres de este cliente<br />");
        }

        public function soporteNoAlquilado() : void {
            $this->logError("Este cliente no tiene alquilado ningún elemento");
        }

        public function noEncontrado() : void {
            if ($this->code == 1) {
                $this->soporteNoEncontrado();
            } else {
                $this->soporteNoAlquilado();
            }
        }
    }
