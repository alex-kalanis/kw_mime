<?php

namespace tests\ChecksTests\TraitsTests;


use tests\CommonTestClass;
use kalanis\kw_mime\MimeException;


class ToStringTest extends CommonTestClass
{
    /**
     * @throws MimeException
     */
    public function testNone1(): void
    {
        $lib = new XToString();
        $this->expectException(MimeException::class);
        $lib->convert('file', false);
    }

    /**
     * @throws MimeException
     */
    public function testNone2(): void
    {
        $lib = new XToString();
        $this->expectException(MimeException::class);
        $lib->convert('file', null);
    }

    /**
     * @throws MimeException
     */
    public function testString(): void
    {
        $lib = new XToString();
        $this->assertEquals('test data', $lib->convert('data', 'test data'));
        $this->assertEquals('123456', $lib->convert('nums', 123456));
    }

    /**
     * @throws MimeException
     */
    public function testResource(): void
    {
        $lib = new XToString();
        $res = @fopen('php://memory', 'r+');
        fwrite($res, 'okmijnuhb');
        $this->assertEquals('okmijnuhb', $lib->convert('res', $res));
    }
}
