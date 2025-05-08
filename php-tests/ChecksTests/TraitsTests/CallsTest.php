<?php

namespace tests\ChecksTests\TraitsTests;


use tests\CommonTestClass;
use kalanis\kw_mime\MimeException;


class CallsTest extends CommonTestClass
{
    /**
     * @throws MimeException
     * @requires function mime_content_type
     */
    public function testClass(): void
    {
        $lib = new XCalls();
        $lib->checkMimeClass();
        $this->assertTrue(true);
    }

    /**
     * @throws MimeException
     * @requires function mime_content_type
     */
    public function testMethod(): void
    {
        $lib = new XCalls();
        $lib->checkMimeMethod();
        $this->assertTrue(true);
    }

    /**
     * @throws MimeException
     * @requires function mime_content_type
     */
    public function testFunction(): void
    {
        $lib = new XCalls();
        $lib->checkMimeFunction();
        $this->assertTrue(true);
    }
}
