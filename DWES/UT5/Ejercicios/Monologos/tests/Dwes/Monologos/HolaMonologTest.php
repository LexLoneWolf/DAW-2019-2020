<?php 

namespace Dwes\Monologos;

use PHPUnit\Framework\TestCase;

class HolaMonologTest extends TestCase {

    public function testSaludar() {
        
        $hm = new HolaMonolog(10);

        $this->assertSame(10,$hm->getHora());
        
    }
}
