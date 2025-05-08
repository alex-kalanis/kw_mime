<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\LocalVolume1;
use kalanis\kw_paths\PathsException;


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
