<?php

namespace ChecksTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TToLocalFile;
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
        $lib->convert('file', false);
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
        $lib->convert('file', null);
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
        $pt2 = $lib->convert('nums', 123456);
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


class XToLocalFile
{
    use TToLocalFile;

    /** @var string|null */
    protected $tempFile = null;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return string
     */
    public function convert(string $name, $content): string
    {
        $localPath = strval($this->getTempFile());
        $this->readSourceToLocalFile($name, $content, $localPath);
        return $localPath;
    }

    public function initTempFile(): void
    {
        // beware! it immediately creates that temporary file
        $this->tempFile = tempnam(sys_get_temp_dir(), 'MimeSrcTest');
    }

    public function getTempFile(): ?string
    {
        return $this->tempFile;
    }
}
