<?php

namespace tests\ChecksTests;


use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_mime\Check\TempFiles;


class XFTempFiles2 extends TempFiles
{
    public function getProcessFile(): IProcessFiles
    {
        throw new FilesException('mock');
    }
}
