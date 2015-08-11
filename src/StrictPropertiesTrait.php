<?php

declare(strict_types=1);

namespace Majkl578\StrictObjectApi;

use Majkl578\StrictObjectApi\Error\IllegalPropertyAccessError;

/**
 * @author Michael Moravec
 */
trait StrictPropertiesTrait
{
    /**
     * @param string $name
     * @throws IllegalPropertyAccessError
     */
    public function __get(string $name)
    {
        throw IllegalPropertyAccessError::couldNotRead(static::class, $name);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws IllegalPropertyAccessError
     */
    public function __set(string $name, $value)
    {
        throw IllegalPropertyAccessError::couldNotWrite(static::class, $name);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name) : bool
    {
        return FALSE;
    }

    /**
     * @param string $name
     * @throws IllegalPropertyAccessError
     */
    public function __unset(string $name)
    {
        throw IllegalPropertyAccessError::couldNotUnset(static::class, $name);
    }
}
