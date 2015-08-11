<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi\Error;

/**
 * @author Michael Moravec
 */
class UndefinedMethodCallError extends \Error implements Error
{
    /**
     * @param string $class
     * @param string $method
     * @return static
     */
    public static function instanceCall(string $class, string $method)
    {
        return new static(sprintf('Could not call an undefined method %s::%s().', $class, $method));
    }

    /**
     * @param string $class
     * @param string $method
     * @return static
     */
    public static function staticCall(string $class, string $method)
    {
        return new static(sprintf('Could not call an undefined static method %s::%s().', $class, $method));
    }
}
