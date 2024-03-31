<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_mime\Check\DataStorage;
use kalanis\kw_mime\MimeException;
use kalanis\kw_storage\Storage\Key;
use kalanis\kw_storage\Storage;
use kalanis\kw_storage\StorageException;


class DataStorageTest extends CommonTestClass
{
    public function testCannotUseMime(): void
    {
        $lib = new XFDataStorage1();
        $this->assertFalse($lib->canUse('whatever'));
    }

    public function testCannotUseSource(): void
    {
        $lib = new DataStorage();
        $this->assertFalse($lib->canUse('whatever'));
    }

    /**
     * @throws MimeException
     */
    public function testCannotMime(): void
    {
        $lib = new XFDataStorage2();
        $this->expectException(MimeException::class);
        $this->expectExceptionMessage('mock');
        $lib->getMime(['whatever']);
    }

    /**
     * @param string $file
     * @param string $mime
     * @throws MimeException
     * @throws StorageException
     * @dataProvider fullProvider
     */
    public function testFull(string $file, string $mime): void
    {
        $lib = new DataStorage();
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

    /**
     * @throws StorageException
     * @return Storage
     */
    protected function getProcessor(): Storage
    {
        Key\StaticPrefixKey::setPrefix(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
        $lib = new Storage(new Storage\Factory(new Storage\Key\Factory(), new Storage\Target\Factory()));
        $lib->init('volume');
        return $lib;
    }
}


class XFDataStorage1 extends DataStorage
{
    protected function isMimeFunction(): bool
    {
        return false;
    }
}


class XFDataStorage2 extends DataStorage
{
    /**
     * @throws StorageException
     * @return Storage
     */
    public function getStorage(): Storage
    {
        throw new StorageException('mock');
    }
}
