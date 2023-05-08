<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_mime\Check\CustomList;
use kalanis\kw_mime\MimeException;


class CustomListTest extends CommonTestClass
{
    public function testBasic(): void
    {
        $lib = new CustomList();
        $this->assertTrue($lib->canUse('whatever'));
        $this->assertEquals('video/webm', $lib->mimeByExt('webm'));
        $this->assertEquals('text/pascal', $lib->mimeByExt('PAS'));
        $this->assertEquals('application/octet-stream', $lib->mimeByExt('FOO'));
    }

    /**
     * @param string $file
     * @param string $mime
     * @throws MimeException
     * @dataProvider fullProvider
     */
    public function testFull(string $file, string $mime): void
    {
        $lib = new CustomList();
        $this->assertEquals($mime, $lib->getMime([$file]));
    }

    public function fullProvider(): array
    {
        return [
            ['test.class', 'application/java-vm'],
            ['test.pas', 'text/pascal'],
        ];
    }
}
