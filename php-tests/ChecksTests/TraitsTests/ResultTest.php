<?php

namespace CheckTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TResult;


class ResultTest extends CommonTestClass
{
    /**
     * @param mixed $data
     * @param string $mime
     * @dataProvider fullProvider
     */
    public function testFull($data, string $mime): void
    {
        $lib = new XResult();
        $this->assertEquals($mime, $lib->determineResult($data));
    }

    public function fullProvider(): array
    {
        return [
            ['text/plain', 'text/plain'],
            ['123456', '123456'],
            [123456, 'application/octet-stream'],
            [123.456, 'application/octet-stream'],
            [true, 'application/octet-stream'],
            [false, 'application/octet-stream'],
            [null, 'application/octet-stream'],
            [new \stdClass(), 'application/octet-stream'],
        ];
    }
}


class XResult
{
    use TResult;
}
