<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_mime\MimeException;
use kalanis\kw_mime\MimeType;
use kalanis\kw_paths\PathsException;


class MimeTest extends CommonTestClass
{
    public function testBasic(): void
    {
        $lib = new MimeType(true);
        $this->assertEquals('video/webm', $lib->mimeByExt('webm'));
        $this->assertEquals('text/pascal', $lib->mimeByExt('PAS'));
        $this->assertEquals('application/octet-stream', $lib->mimeByExt('FOO'));
    }

    /**
     * @param string $file
     * @param string $mime
     * @param bool $localAtFirst
     * @throws MimeException
     * @throws PathsException
     * @dataProvider fullProvider
     */
    public function testFull(string $file, string $mime, bool $localAtFirst): void
    {
        $lib = new MimeType($localAtFirst);
        $this->assertEquals($mime, $lib->mimeByPath(realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $file)));
    }

    public function fullProvider(): array
    {
        return [
            ['test.class', $this->defaultJavaFileMime(), false],
            ['test.pas', 'text/plain', false],
            ['test.class', 'application/java-vm', true],
            ['test.pas', 'text/pascal', true],
        ];
    }
}
