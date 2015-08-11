<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi\Error;

/**
 * @author Michael Moravec
 */
class IllegalPropertyAccessError extends \Error implements Error
{
    /**
     * @param string $class
     * @param string $property
     * @return static
     */
    public static function couldNotRead(string $class, string $property)
    {
        return new static(sprintf('Could not read an undefined property %s::$%s.', $class, $property));
    }

    /**
     * @param string $class
     * @param string $property
     * @return static
     */
    public static function couldNotWrite(string $class, string $property)
    {
        return new static(sprintf('Could not write to an undefined property %s::$%s.', $class, $property));
    }

    /**
     * @param string $class
     * @param string $property
     * @return static
     */
    public static function couldNotUnset(string $class, string $property)
    {
        return new static(sprintf('Could not unset an undefined property %s::$%s.', $class, $property));
    }
}
