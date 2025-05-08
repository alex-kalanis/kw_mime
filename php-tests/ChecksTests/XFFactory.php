<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check;


class XFFactory extends Check\Factory
{
    public function isMimeFunction(): bool
    {
        return false;
    }
}

