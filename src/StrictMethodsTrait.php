<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi;

use Majkl578\StrictObjectApi\Error\UndefinedMethodCallError;

/**
 * @author Michael Moravec
 */
trait StrictMethodsTrait
{
    /**
     * @param string $name
     * @param array $arguments
     * @throws UndefinedMethodCallError
     */
    public function __call(string $name, array $arguments)
    {
        throw UndefinedMethodCallError::instanceCall(static::class, $name);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @throws UndefinedMethodCallError
     */
    public static function __callStatic(string $name, array $arguments)
    {
        throw UndefinedMethodCallError::staticCall(static::class, $name);
    }
}
