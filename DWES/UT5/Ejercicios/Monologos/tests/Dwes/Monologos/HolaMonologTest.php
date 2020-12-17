<?php 

namespace Dwes\Monologos;

use PHPUnit\Framework\TestCase;

class HolaMonologTest extends TestCase {

    /*public function testSaludar() {
        
        $hm = new HolaMonolog(10);
        $this->assertSame(10,$hm->getHora());
        $this->assertSame("Buenos días", $hm->saludar());

        $hm = new HolaMonolog(13);
        $this->assertSame(13,$hm->getHora());
        $this->assertSame("Buenas tardes", $hm->saludar());

        $hm = new HolaMonolog(22);
        $this->assertSame(22,$hm->getHora());
        $this->assertSame("Buenas noches", $hm->saludar());
        $hm->saludar();
        $hm->saludar();
        $hm->saludar();

        $this->assertsame(["Buenas noches", "Buenas noches", "Buenas noches"], $hm->getUltimosSaludos());
    }*/
    
    /*public function testDespedir() {

        $hm = new HolaMonolog(10);
        $this->assertSame("Hasta mañana", $hm->despedir());
    }*/

    /**
     * @dataProvider saludosProvider
     */
    public function testSaludarConProvider($hora, $saludoEsperado, $arraySaludos) {
        $hm = new HolaMonolog($hora);
        $this->assertSame($hora, $hm->getHora());
        $this->assertSame($saludoEsperado, $hm->saludar());
        $hm->saludar();
        $hm->saludar();
        $hm->saludar();
        $this->assertSame($arraySaludos, $hm->getUltimosSaludos());   
    }

    public function saludosProvider() {
        return [
            "saludo1" => [8, "", [""]],
            "saludo2" => [8, "Buenos días", ["Buenos días"]],
            "saludo3" => [8, "Buenos días", ["Buenos días", "Buenos días"]],
            "saludo4" => [8, "Buenos días", ["Buenos días", "Buenos días", "Buenos días"]],
            "saludo5" => [8, "Buenos días", ["Buenos días", "Buenas tardes", "Buenas noches"]]
        ];
    }

    /**
     * @dataProvider despedirConProvider
     */
    public function testDespedirConProvider($hora, $despedidaEsperada, $arrayDespedidas) {
        $hm = new HolaMonolog($hora);
        $this->assertSame($hora, $hm->getHora());
        $this->assertSame($despedidaEsperada, $hm->despedir());
        $hm->despedir();
        $hm->despedir();
        $hm->despedir();
        $this->assertSame($arrayDespedidas, $hm->getUltimosSaludos());
    }

    public function despedirConProvider() {
        return [
            "despedida1" => [18, "", [""]],
            "despedida2" => [18, "Hasta luego", ["Hasta luego"]],
            "despedida3" => [18, "Hasta luego", ["Hasta luego", "Hasta luego"]],
            "despedida4" => [18, "Hasta luego", ["Hasta luego", "Hasta luego", "Hasta luego"]],
            "despedida5" => [18, "Hasta luego", ["Hasta luego", "Hasta luego", "Hasta mañana"]]
        ];
    }
}
