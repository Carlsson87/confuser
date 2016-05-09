<?php

namespace Confuser;

/**
 * Convert a 4 byte integer to a 10 character string and vice versa.
 */
class Confuser {

    /**
     * Create a string from an integer.
     *
     * @param int $int
     * @return string
     */
    public static function toString($int)
    {
        // Assert that the input is valid.
        if (!is_int($int) || $int > 4294967295 || $int < 1) {
            throw new \Exception('Input need to be an integer between 1 - 4294967295');
        }

        // Convert the value to hexadecimal.
        $hex = strtoupper(dechex($int));

        // Create a string of characters to "pad" the hex value with.
        $str = implode(array_map(function($i) {
            return chr(71 + $i % 20); 
        }, range($int, $int * (10 - strlen($hex)), $int)));

        // Pad right if odd, pad left if even.
        return ($int % 2) ? $hex . $str : $str . $hex;
    }

    /**
     * Convert a string back to an integer.
     *
     * @param string $string
     * @return int
     */
    public static function toInt($str)
    {
        // Assert that the input is valid.
        if (!is_string($str) || strlen($str) !== 10) {
            throw new \Exception('Input need to be a string of 10 characters');
        }

        // Filter out the valid hex characters and convert to integer.
        $int = hexdec(implode(array_filter(str_split($str), function($char) {
            return is_int(strpos('0123456789ABCDEF', $char));
        })));

        if ($str !== static::toString($int)) {
            throw new \Exception('The string provided does not match the pattern used by this class');
        }

        return $int;
    }
}
