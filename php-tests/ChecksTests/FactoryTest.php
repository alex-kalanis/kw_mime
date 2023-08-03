<?php

namespace CheckTests;


use CommonTestClass;
use kalanis\kw_files\Processing\Storage\Files\Basic;
use kalanis\kw_mime\Check;
use kalanis\kw_storage\Storage;


class FactoryTest extends CommonTestClass
{
    public function testNoInternalLib(): void
    {
        $lib = new XFFactory();
        $this->assertInstanceOf(Check\CustomList::class, $lib->getLibrary('anything'));
    }

    /**
     * @param mixed $params
     * @param string $class
     * @dataProvider fullProvider
     */
    public function testFull($params, string $class): void
    {
        $lib = new Check\Factory();
        $this->assertInstanceOf($class, $lib->getLibrary($params));
    }

    public function fullProvider(): array
    {
        return [
            [new Basic(new Storage\Storage(new Storage\Key\StaticPrefixKey(), new Storage\Target\Volume())), Check\DataFiles::class],
            [new Storage(new Storage\Factory(new Storage\Key\Factory(), new Storage\Target\Factory())), Check\DataStorage::class],
            ['test.pas', Check\LocalVolume1::class],
            [123456, Check\CustomList::class],
            [null, Check\CustomList::class],
            [false, Check\CustomList::class],
        ];
    }
}


class XFFactory extends Check\Factory
{
    public function isMimeFunction(): bool
    {
        return false;
    }
}

