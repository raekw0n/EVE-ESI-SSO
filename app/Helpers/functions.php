<?php

if (!function_exists('is_32bit_unsigned_int'))
{
    function is_32bit_signed_int($value)
    {
        return (abs($value) & 0x7FFFFFFF) === abs($value);
    }
}
