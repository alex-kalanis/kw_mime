<?php

namespace tests\ChecksTests;


use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_mime\Check\ResourceFiles;


class XFResourceFiles1 extends ResourceFiles
{
    protected function isMimeFunction(): bool
    {
        return false;
    }
}
