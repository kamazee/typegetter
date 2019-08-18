<?php

namespace Kamazee\TypeGetter;

use function gettype;
use function is_object;

class TypeGetter
{
    public static function getReadable($var)
    {
        if (!is_object($var)) {
            return self::getCorrectInternalType($var);
        }

        return sprintf('object (%s)', get_class($var));
    }

    private static function getCorrectInternalType($var)
    {
        $type = gettype($var);
        if ('double' === $type) {
            return 'float';
        }

        if ('integer' === $type) {
            return 'int';
        }

        if ('boolean' === $type) {
            return 'bool';
        }

        if ('NULL' === $type) {
            return 'null';
        }

        return $type;
    }
}
