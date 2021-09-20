<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_mime\MimeType;


class MimeTest extends CommonTestClass
{
    public function testBasic(): void
    {
        $this->assertEquals('video/webm', MimeType::mimeByExt('webm'));
        $this->assertEquals('text/pascal', MimeType::mimeByExt('PAS'));
        $this->assertEquals('application/octet-stream', MimeType::mimeByExt('FOO'));
    }

    /**
     * @param string $file
     * @param string $mime
     * @param bool $localAtFirst
     * @dataProvider fullProvider
     */
    public function testFull(string $file, string $mime, bool $localAtFirst): void
    {
        $lib = new MimeType($localAtFirst);
        $this->assertEquals($mime, $lib->mimeByPath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $file));
    }

    public function fullProvider(): array
    {
        return [
            ['test.class', 'text/x-c', false],
            ['test.pas', 'text/plain', false],
            ['test.class', 'application/java-vm', true],
            ['test.pas', 'text/pascal', true],
        ];
    }
}
