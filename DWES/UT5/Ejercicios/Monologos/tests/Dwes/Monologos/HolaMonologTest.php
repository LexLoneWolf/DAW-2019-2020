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

        $hm = new HolaMonolog(22);
        $this->assertSame(22,$hm->getHora());
        
    }
    
    public function testDespedir() {

        $hm = new HolaMonolog(10);
        $this->assertSame("Hasta mañana", $hm->despedir());
    }
}
