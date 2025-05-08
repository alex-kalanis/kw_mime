<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\DataStorage;


class XFDataStorage1 extends DataStorage
{
    protected function isMimeFunction(): bool
    {
        return false;
    }
}
