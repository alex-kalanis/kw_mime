<?php

namespace tests\ChecksTests;


use tests\CommonTestClass;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_files\Processing\Storage\Files\Basic;
use kalanis\kw_mime\Check\ResourceFiles;
use kalanis\kw_mime\MimeException;
use kalanis\kw_storage\Storage\Key;
use kalanis\kw_storage\Storage\Storage;
use kalanis\kw_storage\Storage\Target\Volume;


class ResourceFilesTest extends CommonTestClass
{
    public function testCannotUseMime(): void
    {
        $lib = new XFResourceFiles1();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseSource(): void
    {
        $lib = new ResourceFiles();
        $this->assertFalse($lib->canUse('whatever'));
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime(): void
    {
        $lib = new XFResourceFiles2();
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
        $lib = new ResourceFiles();
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
        Key\StaticPrefixKey::setPrefix(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
        return new Basic(new Storage(new Key\StaticPrefixKey(), new Volume()));
    }
}
