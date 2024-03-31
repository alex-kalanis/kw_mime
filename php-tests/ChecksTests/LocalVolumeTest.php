<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_mime\Check\LocalVolume1;
use kalanis\kw_mime\Check\LocalVolume2;
use kalanis\kw_mime\MimeException;
use kalanis\kw_paths\PathsException;


class LocalVolumeTest extends CommonTestClass
{
    public function testCannotUseMime1(): void
    {
        $lib = new XFLocalVolume11();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseMime2(): void
    {
        $lib = new XFLocalVolume21();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseSource(): void
    {
        $lib = new LocalVolume1();
        $this->assertFalse($lib->canUse(null));
        $this->assertFalse($lib->canUse(fopen('php://memory', 'r+')));
        $this->assertFalse($lib->canUse('not-a-known-path'));
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime1(): void
    {
        $lib = new XFLocalVolume12();
        $this->expectExceptionMessage('mock 1');
        $this->expectException(MimeException::class);
        $lib->getMime(['whatever']);
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime2(): void
    {
        $lib = new XFLocalVolume22();
        $this->expectExceptionMessage('mock 2');
        $this->expectException(MimeException::class);
        $lib->getMime(['whatever']);
    }

    /**
     * @param string $file
     * @param string $mime
     * @throws MimeException
     * @dataProvider fullProvider1
     */
    public function testFull1(string $file, string $mime): void
    {
        $lib = new LocalVolume1();
        $lib->canUse(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data');
        $this->assertEquals($mime, $lib->getMime([$file]));
    }

    /**
     * @param string $file
     * @param string $mime
     * @throws MimeException
     * @dataProvider fullProvider2
     */
    public function testFull2(string $file, string $mime): void
    {
        $lib = new LocalVolume2();
        $lib->canUse(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data');
        $this->assertEquals($mime, $lib->getMime([$file]));
    }

    public function fullProvider1(): array
    {
        return [
            ['test.class', 'text/x-c'],
            ['test.pas', 'text/plain'],
        ];
    }

    public function fullProvider2(): array
    {
        return [
            ['test.class', 'text/plain; charset=us-ascii'],
            ['test.pas', 'text/plain; charset=us-ascii'],
        ];
    }
}


class XFLocalVolume11 extends LocalVolume1
{
    public function isMimeFunction(): bool
    {
        return false;
    }
}


class XFLocalVolume21 extends LocalVolume2
{
    public function isMimeClass(): bool
    {
        return false;
    }
}


class XFLocalVolume12 extends LocalVolume1
{
    /**
     * @param string[] $path
     * @throws PathsException
     * @return string
     */
    protected function pathOnVolume(array $path): string
    {
        throw new PathsException('mock 1');
    }
}


class XFLocalVolume22 extends LocalVolume2
{
    /**
     * @param string[] $path
     * @throws PathsException
     * @return string
     */
    protected function pathOnVolume(array $path): string
    {
        throw new PathsException('mock 2');
    }
}
