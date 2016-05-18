<?php

namespace Garethellis\ExpressiveMaths;

use Assert\Assertion;

class Number
{
    /**
     * @var int|float|string An integer, float or numeric string
     */
    private $number;

    /**
     * Number constructor.
     * @param int|float|string $number An integer, float or numeric string.
     */
    public function __construct($number)
    {
        Assertion::numeric($number);
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->number;
    }

    /**
     * @return float|int|string
     */
    public function equals()
    {
        return $this->number;
    }

    /**
     * Calculate the value of the current number as a percentage of the given number.
     *
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number|null Returns null if $number is zero.
     */
    public function asAPercentageOf($number)
    {
        Assertion::numeric($number);
        if (!$number) {
            return null;
        }
        return new self($this->dividedBy($number)->equals() * 100);
    }

    /**
     * Adds current number to the given number.
     *
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function add($number)
    {
        Assertion::numeric($number);
        return new self($this->number + $number);
    }

    /**
     * Alias for Number::add()
     *
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function plus($number)
    {
        return $this->add($number);
    }

    /**
     * Subtracts given number from current number.
     * 
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function minus($number)
    {
        Assertion::numeric($number);
        return new self($this->number - $number);
    }

    /**
     * Alias for Number::minus()
     * 
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function subtract($number)
    {
        return $this->minus($number);
    }

    /**
     * Multiply current number by given number.
     * 
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function times($number)
    {
        Assertion::numeric($number);
        return new self($this->number * $number);
    }

    /**
     * Alias for Number::times()
     *
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number
     */
    public function multipliedBy($number)
    {
        return $this->times($number);
    }

    /**
     * Divide current number by given number.
     * 
     * @param int|float|string $number An integer, float or numeric string.
     * @return Number|null Returns null if $number is zero.
     */
    public function dividedBy($number)
    {
        Assertion::numeric($number);
        if (!$number) {
            return null;
        }
        return new self($this->number / $number);
    }

    /**
     * @return Number
     */
    public function squared()
    {
        return new self($this->number * $this->number);
    }

    public function toThePower($n)
    {
        Assertion::numeric($n);
        return new self($this->number ** $n);
    }
}
