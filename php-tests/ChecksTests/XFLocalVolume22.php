<?php

namespace tests\ChecksTests;


use kalanis\kw_mime\Check\LocalVolume2;
use kalanis\kw_paths\PathsException;


class XFLocalVolume22 extends LocalVolume2
{
    /**
     * @param string[] $path
     * @throws PathsException
     * @return string
     */
    protected function pathOnVolume(array $path): string
    {
        throw new PathsException('mock 2');
    }
}
