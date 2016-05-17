<?php

namespace Garethellis\ExpressiveMaths;

/**
 * @param int|float|string $number An integer, float or numeric string.
 * @return Number
 */
function calculate($number)
{
    return new Number($number);
}

/**
 * @param int|float|string $number An integer, float or numeric string.
 * @return Number
 */
function whatIs($number)
{
    return calculate($number);
}
