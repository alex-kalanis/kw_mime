<?php

namespace tests\ChecksTests\TraitsTests;


use kalanis\kw_mime\Translations;


class XTrLang extends Translations
{
    public function miNoStorage(): string
    {
        return 'test data';
    }
}
