<?php 
    namespace Dwes\Videoclub\Util;
    class CupoSuperadoException extends VideoclubException {

        use \Dwes\Videoclub\Util\Logger;

        public function cupoSuperado(): void {
            $this->logWarning("Este cliente tiene " . $this->message .
            " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br />");
        }
    }

