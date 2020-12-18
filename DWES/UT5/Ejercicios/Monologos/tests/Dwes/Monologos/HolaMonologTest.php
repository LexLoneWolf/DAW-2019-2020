<?php 

namespace Dwes\Monologos;

use PHPUnit\Framework\TestCase;

class HolaMonologTest extends TestCase {

    public function testSaludar() {
        
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
    }
    
    public function testDespedir() {

        $hm = new HolaMonolog(10);
        $this->assertSame("Hasta luego", $hm->despedir());

        $hm = new HolaMonolog(20);
        $this->assertSame("Hasta mañana", $hm->despedir());
    }

    /**
     * @dataProvider saludosProvider
     */
    public function testSaludarConProvider($hora, $saludoEsperado) {
        $hm = new HolaMonolog($hora);
        $this->assertSame($hora, $hm->getHora());
        $this->assertSame($saludoEsperado, $hm->saludar());
    }

    public function saludosProvider() {
        return [
            "saludo1" => [8, "Buenos días"],
            "saludo2" => [17, "Buenas tardes"],
            "saludo3" => [20, "Buenas noches"]
        ];
    }

    /**
     * @dataProvider despedirConProvider
     */
    public function testDespedirConProvider($hora, $despedidaEsperada) {
        $hm = new HolaMonolog($hora);
        $this->assertSame($hora, $hm->getHora());
        $this->assertSame($despedidaEsperada, $hm->despedir());
    }

    public function despedirConProvider() {
        return [
            "despedida1" => [19, "Hasta luego"],
            "despedida2" => [20, "Hasta mañana"],
        ];
    }

    public function testHoraIncorrecta() {
        $this->expectException(\InvalidArgumentException::class);
        $hm = new HolaMonolog(-1);
        $hm->setHora(8);
        $this->expectException(\InvalidArgumentException::class);
        $hm->setHora(25);
    }

    public function testSetHora() {
        $hm = new HolaMonolog(24);
        $hm->setHora(22);
        $this->expectException(\InvalidArgumentException::class);
        $hm->setHora(-1);
    }
}
