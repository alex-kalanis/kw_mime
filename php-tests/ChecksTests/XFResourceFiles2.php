<?php

namespace tests\ChecksTests;


use kalanis\kw_files\FilesException;
use kalanis\kw_files\Interfaces\IProcessFiles;
use kalanis\kw_mime\Check\ResourceFiles;


class XFResourceFiles2 extends ResourceFiles
{
    public function getProcessFile(): IProcessFiles
    {
        throw new FilesException('mock');
    }
}
