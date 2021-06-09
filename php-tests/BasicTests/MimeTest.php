<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_mime\MimeType;


class MimeTest extends CommonTestClass
{
    public function testBasic(): void
    {
        $path = new MimeType(true);
        $this->assertEquals('video/webm', $path->mimeByExt('webm'));
        $this->assertEquals('text/pascal', $path->mimeByExt('PAS'));
        $this->assertEquals('application/octet-stream', $path->mimeByExt('FOO'));
    }
}
