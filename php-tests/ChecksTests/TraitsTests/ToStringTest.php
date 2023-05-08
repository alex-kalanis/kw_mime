<?php

namespace ChecksTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TToString;
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


class XToString
{
    use TToString;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return string
     */
    public function convert(string $name, $content): string
    {
        return $this->readSourceToString($name, $content);
    }
}
