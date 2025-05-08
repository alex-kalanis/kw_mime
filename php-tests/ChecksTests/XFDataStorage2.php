<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\DataStorage;
use kalanis\kw_storage\Storage;
use kalanis\kw_storage\StorageException;


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
