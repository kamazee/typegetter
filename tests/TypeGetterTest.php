<?php

namespace Kamazee\TypeGetter;

use PHPUnit\Framework\TestCase;
use stdClass;

class TypeGetterTest extends TestCase
{
    public function testString()
    {
        $this->assertEquals('string', TypeGetter::getReadable('test'));
    }

    public function testInt()
    {
        $this->assertEquals('int', TypeGetter::getReadable(123));
    }

    public function testArray()
    {
        $this->assertEquals('array', TypeGetter::getReadable([]));
    }

    public function testResource()
    {
        $resource = fopen('php://memory', 'rb');
        $this->assertEquals('resource', TypeGetter::getReadable($resource));
    }

    public function testFloat()
    {
        $this->assertEquals('float', TypeGetter::getReadable(0.1));
    }

    public function testBool()
    {
        $this->assertEquals('bool', TypeGetter::getReadable(true));
    }

    public function testNull()
    {
        $this->assertEquals('null', TypeGetter::getReadable(null));
    }

    public function testObject()
    {
        $this->assertEquals(
            'object (stdClass)',
            TypeGetter::getReadable(new stdClass())
        );
    }
}
