<?php

namespace Confuser;

class ConfuserTest extends \PHPUnit_Framework_TestCase {

    public function testThatItWorks()
    {
        $int = 4294967295;
        $str = Confuser::toString($int);
        $res = Confuser::toInt($str);

        $this->assertTrue(is_string($str));
        $this->assertEquals(strlen($str), 10);
        $this->assertTrue(is_int($int));
        $this->assertEquals($res, $int);
    }

    /**
     * @expectedException \Exception
     */
    public function testThatItThrowOnInvalidInt()
    {
        Confuser::toString(-1);
    }

    /**
     * @expectedException \Exception
     */
    public function testThatItThrowOnInvalidString()
    {
        Confuser::toInt("AFB");
    }
}
