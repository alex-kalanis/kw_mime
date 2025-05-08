<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\TempFiles;


class XFTempFiles1 extends TempFiles
{
    protected function isMimeFunction(): bool
    {
        return false;
    }
}
