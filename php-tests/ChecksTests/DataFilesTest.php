<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_files\Processing\Storage\Files\Basic;
use kalanis\kw_mime\Check\DataFiles;
use kalanis\kw_mime\MimeException;
use kalanis\kw_storage\Storage;


class DataFilesTest extends CommonTestClass
{
    public function testCannotUseMime(): void
    {
        $lib = new XFDataFiles();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseSource(): void
    {
        $lib = new DataFiles();
        $this->assertFalse($lib->canUse('whatever'));
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime(): void
    {
        $lib = new XFDataFiles();
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
        $lib = new DataFiles();
        $lib->canUse($this->getProcessor());
        $this->assertEquals($mime, $lib->getMime([$file]));
    }

    public function fullProvider(): array
    {
        return [
            ['test.class', $this->defaultJavaFileMime()],
            ['test.pas', 'text/plain'],
        ];
    }

    protected function getProcessor(): IProcessFiles
    {
        Storage\Key\StaticPrefixKey::setPrefix(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
        return new Basic(new Storage\Storage(new Storage\Key\StaticPrefixKey(), new Storage\Target\Volume()));
    }
}


class XFDataFiles extends DataFiles
{
    protected function isMimeFunction(): bool
    {
        return false;
    }

    public function getProcessFile(): IProcessFiles
    {
        throw new FilesException('mock');
    }
}
