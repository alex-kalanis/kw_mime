<?php

namespace tests\ChecksTests\TraitsTests;


use kalanis\kw_mime\Check\Traits\TToResource;
use kalanis\kw_mime\MimeException;


class XToResource
{
    use TToResource;

    /**
     * @param string $name
     * @param string|resource $content
     * @throws MimeException
     * @return resource
     */
    public function convert(string $name, $content)
    {
        return $this->readSourceToResource($name, $content);
    }
}
