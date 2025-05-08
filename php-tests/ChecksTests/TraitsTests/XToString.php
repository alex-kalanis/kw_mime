<?php

namespace tests\ChecksTests\TraitsTests;


use kalanis\kw_mime\Check\Traits\TToString;
use kalanis\kw_mime\MimeException;


class XToString
{
    use TToString;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return string
     */
    public function convert(string $name, $content): string
    {
        return $this->readSourceToString($name, $content);
    }
}
