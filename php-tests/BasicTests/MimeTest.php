<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_mime\MimeType;


class MimeTest extends CommonTestClass
{
    public function testBasic(): void
    {
        new MimeType(true);
        $this->assertEquals('video/webm', MimeType::mimeByExt('webm'));
        $this->assertEquals('text/pascal', MimeType::mimeByExt('PAS'));
        $this->assertEquals('application/octet-stream', MimeType::mimeByExt('FOO'));
    }
}
