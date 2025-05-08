<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\LocalVolume1;
use kalanis\kw_mime\Check\LocalVolume2;
use kalanis\kw_paths\PathsException;


class XFLocalVolume21 extends LocalVolume2
{
    public function isMimeClass(): bool
    {
        return false;
    }
}
