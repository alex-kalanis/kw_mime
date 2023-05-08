<?php

namespace ChecksTests\TraitsTests;


use CommonTestClass;
use kalanis\kw_mime\Check\Traits\TLang;
use kalanis\kw_mime\Translations;


class LangTest extends CommonTestClass
{
    public function testOwn(): void
    {
        $lib = new XLang();
        $lib->setMiLang(new XTrLang());
        $this->assertInstanceOf(XTrLang::class, $lib->getMiLang());
        $this->assertInstanceOf(Translations::class, $lib->getMiLang());
        $this->assertEquals('test data', $lib->getMiLang()->miNoStorage());
    }

    public function testNone(): void
    {
        $lib = new XLang();
        $this->assertInstanceOf(Translations::class, $lib->getMiLang());
        $this->assertEquals('No storage set!', $lib->getMiLang()->miNoStorage());
    }
}


class XLang
{
    use TLang;
}


class XTrLang extends Translations
{
    public function miNoStorage(): string
    {
        return 'test data';
    }
}
