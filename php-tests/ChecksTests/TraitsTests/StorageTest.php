<?php

namespace ChecksTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TStorage;
use kalanis\kw_mime\MimeException;
use kalanis\kw_storage\Storage;
use kalanis\kw_storage\StorageException;


class StorageTest extends CommonTestClass
{
    /**
     * @throws MimeException
     * @throws StorageException
     */
    public function testOwn(): void
    {
        $store = new Storage(new Storage\Factory(new Storage\Key\Factory(), new Storage\Target\Factory()));
        $store->init('none');
        $lib = new XStorage();
        $lib->setStorage($store);
        $this->assertInstanceOf(Storage::class, $lib->getStorage());
    }

    /**
     * @throws MimeException
     */
    public function testNone(): void
    {
        $lib = new XStorage();
        $this->expectException(MimeException::class);
        $lib->getStorage();
    }
}


class XStorage
{
    use TStorage;
}
