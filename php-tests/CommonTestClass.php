<?php

namespace tests;


use PHPUnit\Framework\TestCase;


/**
 * Class CommonTestClass
 * The structure for mocking and configuration seems so complicated, but it's necessary to let it be totally idiot-proof
 */
abstract class CommonTestClass extends TestCase
{
    public function defaultJavaFileMime(): string
    {
        return (PHP_VERSION_ID >= 80300) ? 'text/x-java' : 'text/x-c';
    }
}
