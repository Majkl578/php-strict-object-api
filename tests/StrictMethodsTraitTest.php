<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi\Tests;

use Test\MethodsTestObject;

/**
 * @author Michael Moravec
 */
class StrictMethodsTraitTest extends \PHPUnit_Framework_TestCase
{
    /** @var MethodsTestObject */
    private $object;

    protected function setUp()
    {
        parent::setUp();
        $this->object = new MethodsTestObject();
    }

    public function testIgnoresExistingInstanceMethods()
    {
        $this->assertTrue($this->object->isInstanceCalled());
    }

    public function testIgnoresExistingStaticMethods()
    {
        $this->assertTrue(MethodsTestObject::isStaticCalled());
    }

    /**
     * @expectedException \Majkl578\StrictObjectApi\Error\UndefinedMethodCallError
     * @expectedExceptionMessage Could not call an undefined method Test\MethodsTestObject::invalidInstance().
     */
    public function testInterceptsUndefinedInstanceMethods()
    {
        $this->assertTrue($this->object->invalidInstance());
    }

    /**
     * @expectedException \Majkl578\StrictObjectApi\Error\UndefinedMethodCallError
     * @expectedExceptionMessage Could not call an undefined static method Test\MethodsTestObject::invalidStatic().
     */
    public function testInterceptsUndefinedStaticMethods()
    {
        $this->assertTrue(MethodsTestObject::invalidStatic());
    }
}

namespace Test;

use Majkl578\StrictObjectApi\StrictMethodsTrait;

class MethodsTestObject
{
    use StrictMethodsTrait;

    public function isInstanceCalled() : bool
    {
        return TRUE;
    }

    public static function isStaticCalled() : bool
    {
        return TRUE;
    }
}
