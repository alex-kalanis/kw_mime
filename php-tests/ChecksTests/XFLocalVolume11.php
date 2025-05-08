<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\LocalVolume1;


class XFLocalVolume11 extends LocalVolume1
{
    public function isMimeFunction(): bool
    {
        return false;
    }
}
