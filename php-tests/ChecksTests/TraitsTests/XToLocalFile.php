<?php

namespace tests\ChecksTests\TraitsTests;


use kalanis\kw_mime\Check\Traits\TToLocalFile;
use kalanis\kw_mime\MimeException;


class XToLocalFile
{
    use TToLocalFile;

    protected ?string $tempFile = null;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return string
     */
    public function convert(string $name, $content): string
    {
        $localPath = strval($this->getTempFile());
        $this->readSourceToLocalFile($name, $content, $localPath);
        return $localPath;
    }

    public function initTempFile(): void
    {
        // beware! it immediately creates that temporary file
        $this->tempFile = tempnam(sys_get_temp_dir(), 'MimeSrcTest');
    }

    public function getTempFile(): ?string
    {
        return $this->tempFile;
    }
}
