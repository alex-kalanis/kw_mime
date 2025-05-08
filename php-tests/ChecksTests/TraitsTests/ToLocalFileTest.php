<?php

namespace tests\ChecksTests\TraitsTests;


use tests\CommonTestClass;
use kalanis\kw_mime\MimeException;


class ToLocalFileTest extends CommonTestClass
{
    /**
     * @throws MimeException
     */
    public function testNone1(): void
    {
        $lib = new XToLocalFile();
        $lib->initTempFile();
        @unlink($lib->getTempFile());
        $this->expectException(MimeException::class);
        $lib->convert('file', /** @scrutinizer ignore-type */ false);
    }

    /**
     * @throws MimeException
     */
    public function testNone2(): void
    {
        $lib = new XToLocalFile();
        $lib->initTempFile();
        @unlink($lib->getTempFile());
        $this->expectException(MimeException::class);
        $lib->convert('file', /** @scrutinizer ignore-type */ null);
    }

    /**
     * @throws MimeException
     */
    public function testString(): void
    {
        $lib = new XToLocalFile();
        $lib->initTempFile();
        $pt1 = $lib->convert('data', 'test data');
        $this->assertEquals('test data', file_get_contents($pt1));
        @unlink($pt1);
        $lib->initTempFile();
        $pt2 = $lib->convert('nums', /** @scrutinizer ignore-type */ 123456);
        $this->assertEquals('123456', file_get_contents($pt2));
        @unlink($pt2);
    }

    /**
     * @throws MimeException
     */
    public function testResource(): void
    {
        $lib = new XToLocalFile();
        $res = @fopen('php://memory', 'r+');
        fwrite($res, 'okmijnuhb');
        $lib->initTempFile();
        $pt1 = $lib->convert('res', $res);
        $this->assertEquals('okmijnuhb', file_get_contents($pt1));
        @unlink($pt1);
    }
}
