<?php 
    namespace Dwes\Videoclub\Util;
    trait Logger {

        private $DEBUG = "<span style='color:blue'>debug</span>";
        private $WARNING = "<span style='color:orange'>warning</span>";
        private $ERROR = "<span style='color:red'>error</span>";
        private $ECHO = "<span style='color:black'>error</span>";
        private $CANI = "<span style='color:pink'>error</span>";

        public function logDebug($mensaje) : void {
            $this->log($this->DEBUG, $mensaje);
        }

        public function logWarning($mensaje) : void {
            $this->log($this->WARNING, $mensaje);
        }

        public function logError($mensaje) : void {
            $this->log($this->ERROR, $mensaje);
        }

        public function logEcho($mensaje) : void {
            $this->log($this->ECHO, $mensaje);
        }

        public function logCani($mensaje) : void {
            $this->log($this->CANI, cani($mensaje)); 
        }

        public function log($nivel, $mensaje) : void {
            echo $nivel.":".$mensaje."<br />";
        }

        public function cani(string $str): string {

            for ($i=0, $j=0; $i < strlen($str); $i++, $j++) { 
                if (ctype_space($str[$i])) {
                    $j++;
                }
                if ($j % 2 == 0) {
                    $str[$i] = strtoupper($str[$i]);
                } else {
                    $str[$i] = strtolower($str[$i]);
                }
            }
            return $str;
        }
    }
