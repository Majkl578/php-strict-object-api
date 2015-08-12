<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi\Tests;

use Test\PropertiesTestObject;

/**
 * @author Michael Moravec
 */
class StrictPropertiesTraitTest extends \PHPUnit_Framework_TestCase
{
    /** @var PropertiesTestObject */
    private $object;

    protected function setUp()
    {
        parent::setUp();
        $this->object = new PropertiesTestObject();
    }

    public function testIgnoresValidPropertyRead()
    {
        $this->assertSame(1337, $this->object->value);
    }

    public function testIgnoresValidPropertyWrite()
    {
        $this->assertSame(1337, $this->object->value);
        $this->object->value = 42;
        $this->assertSame(42, $this->object->value);
    }

    public function testIgnoresValidPropertyUnset()
    {
        unset($this->object->value);
        $this->assertFalse(isset($this->object->value));
    }

    public function testIgnoresValidPropertyIsset()
    {
        $this->assertTrue(isset($this->object->value));
    }

    /**
     * @expectedException \Majkl578\StrictObjectApi\Error\IllegalPropertyAccessError
     * @expectedExceptionMessage Could not read an undefined property Test\PropertiesTestObject::$foo.
     */
    public function testInterceptsUndefinedPropertyRead()
    {
        $this->object->foo;
    }

    /**
     * @expectedException \Majkl578\StrictObjectApi\Error\IllegalPropertyAccessError
     * @expectedExceptionMessage Could not write to an undefined property Test\PropertiesTestObject::$foo.
     */
    public function testInterceptsUndefinedPropertyWrite()
    {
        $this->object->foo = 42;
    }

    /**
     * @expectedException \Majkl578\StrictObjectApi\Error\IllegalPropertyAccessError
     * @expectedExceptionMessage Could not unset an undefined property Test\PropertiesTestObject::$foo.
     */
    public function testInterceptsUndefinedPropertyUnset()
    {
        unset($this->object->foo);
    }

    public function testInterceptsUndefinedPropertyIsset()
    {
        $this->assertFalse(isset($this->object->foo));
    }
}

namespace Test;

use Majkl578\StrictObjectApi\StrictPropertiesTrait;

class PropertiesTestObject
{
    use StrictPropertiesTrait;

    public $value = 1337;
}
