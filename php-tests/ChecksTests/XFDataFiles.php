<?php

namespace tests\ChecksTests;


use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_mime\Check\DataFiles;


class XFDataFiles extends DataFiles
{
    protected function isMimeFunction(): bool
    {
        return false;
    }

    public function getProcessFile(): IProcessFiles
    {
        throw new FilesException('mock');
    }
}
