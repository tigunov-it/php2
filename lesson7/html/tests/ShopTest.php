<?php

namespace app\tests;

use PHPUnit\Framework\TestCase;

class ShopTest extends TestCase
{
    public function testAdd() {
        $a = 5;
        $b = 15;
        $this->assertEquals(20, $a + $b);
    }
}