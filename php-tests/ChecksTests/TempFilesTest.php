<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_files\Processing\Storage\Files\Basic;
use kalanis\kw_mime\Check\TempFiles;
use kalanis\kw_mime\MimeException;
use kalanis\kw_storage\Storage\Key;
use kalanis\kw_storage\Storage\Storage;
use kalanis\kw_storage\Storage\Target\Volume;


class TempFilesTest extends CommonTestClass
{
    public function testCannotUseMime(): void
    {
        $lib = new XFTempFiles1();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseSource(): void
    {
        $lib = new TempFiles();
        $this->assertFalse($lib->canUse('whatever'));
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime(): void
    {
        $lib = new XFTempFiles2();
        $this->expectException(MimeException::class);
        $lib->getMime(['whatever']);
    }

    /**
     * @param string $file
     * @param string $mime
     * @throws MimeException
     * @dataProvider fullProvider
     */
    public function testFull(string $file, string $mime): void
    {
        $lib = new TempFiles();
        $lib->canUse($this->getProcessor());
        $this->assertEquals($mime, $lib->getMime([$file]));
    }

    public function fullProvider(): array
    {
        return [
            ['test.class', 'text/x-c'],
            ['test.pas', 'text/plain'],
        ];
    }

    protected function getProcessor(): IProcessFiles
    {
        Key\StaticPrefixKey::setPrefix(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
        return new Basic(new Storage(new Key\StaticPrefixKey(), new Volume()));
    }
}


class XFTempFiles1 extends TempFiles
{
    protected function isMimeFunction(): bool
    {
        return false;
    }
}


class XFTempFiles2 extends TempFiles
{
    public function getProcessFile(): IProcessFiles
    {
        throw new FilesException('mock');
    }
}
