<?php

namespace ChecksTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TToResource;
use kalanis\kw_mime\MimeException;


class ToResourceTest extends CommonTestClass
{
    /**
     * @throws MimeException
     */
    public function testNone1(): void
    {
        $lib = new XToResource();
        $this->expectException(MimeException::class);
        $lib->convert('file', false);
    }

    /**
     * @throws MimeException
     */
    public function testNone2(): void
    {
        $lib = new XToResource();
        $this->expectException(MimeException::class);
        $lib->convert('file', null);
    }

    /**
     * @throws MimeException
     */
    public function testString(): void
    {
        $lib = new XToResource();
        $this->assertEquals('test data', stream_get_contents($lib->convert('data', 'test data'), -1, 0));
        $this->assertEquals('123456', stream_get_contents($lib->convert('nums', 123456), -1, 0));
    }

    /**
     * @throws MimeException
     */
    public function testResource(): void
    {
        $lib = new XToResource();
        $res = @fopen('php://memory', 'r+');
        fwrite($res, 'okmijnuhb');
        $this->assertEquals('okmijnuhb', stream_get_contents($lib->convert('res', $res), -1, 0));
    }
}


class XToResource
{
    use TToResource;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return resource
     */
    public function convert(string $name, $content)
    {
        return $this->readSourceToResource($name, $content);
    }
}
