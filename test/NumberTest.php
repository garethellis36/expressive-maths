<?php

namespace Garethellis\ExpressiveMaths\Test;

use Assert\InvalidArgumentException;
use Garethellis\ExpressiveMaths\Number;
use PHPUnit_Framework_TestCase;
use stdClass;
use function Garethellis\ExpressiveMaths\calculate;
use function Garethellis\ExpressiveMaths\whatIs;

class NumberTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return void
     */
    public function test_function_calculate_returns_number_instance()
    {
        assertThat(calculate(5), is(anInstanceOf(Number::class)));
    }

    /**
     * @return void
     */
    public function test_function_whatIs_returns_number_instance()
    {
        assertThat(whatIs(5), is(anInstanceOf(Number::class)));
    }

    /**
     * @return void
     */
    public function test_that_a_number_instance_cannot_be_created_with_a_non_numeric_string()
    {
        $this->expectException(InvalidArgumentException::class);
        new Number("non numeric string");
    }

    /**
     * @return void
     */
    public function test_that_a_number_instance_cannot_be_created_with_an_array()
    {
        $this->expectException(InvalidArgumentException::class);
        new Number([]);
    }

    /**
     * @return void
     */
    public function test_that_a_number_instance_cannot_be_created_with_a_boolean()
    {
        $this->expectException(InvalidArgumentException::class);
        new Number(true);
    }

    /**
     * @return void
     */
    public function test_that_a_number_instance_cannot_be_created_with_an_object()
    {
        $this->expectException(InvalidArgumentException::class);
        new Number(new stdClass());
    }

    /**
     * @return void
     */
    public function test_it_can_calculate_percentage_of_one_number_as_another()
    {
        assertThat(calculate(25)->asAPercentageOf(100), is(equalTo("25")));
    }

    /**
     * @return void
     */
    public function test_dividing_by_zero_returns_null_when_calculating_percentage()
    {
        assertThat(calculate(25)->asAPercentageOf(0), is(nullValue()));
    }

    /**
     * @return void
     */
    public function test_calculating_percentage_returns_new_object()
    {
        $number = new Number(25);
        $perc   = $number->asAPercentageOf(100);
        assertThat($number, (is(not(sameInstance($perc)))));
    }

    /**
     * @return void
     */
    public function test_it_can_add_one_number_to_another()
    {
        assertThat(calculate(4)->plus(9), is(equalTo("13")));
    }

    /**
     * @return void
     */
    public function test_it_can_subtract_one_number_from_another()
    {
        assertThat(whatIs(10)->subtract(7), is(equalTo("3")));
    }

    /**
     * @return void
     */
    public function test_it_can_multiply_one_number_by_another()
    {
        assertThat(calculate(8)->multipliedBy(6), is(equalTo("48")));
    }

    /**
     * @return void
     */
    public function test_it_can_divide_one_number_by_another()
    {
        assertThat(calculate(9)->dividedBy(3), is(equalTo("3")));
    }

    /**
     * @return void
     */
    public function test_it_returns_null_if_trying_to_divide_by_zero()
    {
        assertThat(whatIs(11)->dividedBy(0), is(nullValue()));
    }

    public function test_it_can_calculate_the_square_of_a_number()
    {
        assertThat(calculate(4)->squared(), is(equalTo("16")));
    }

    /**
     * @return void
     */
    public function test_equals_method_returns_int_when_two_ints_are_operated_on()
    {
        assertThat(calculate(4)->times(3)->equals(), is(identicalTo(12)));
    }

    /**
     * @return void
     */
    public function test_equals_method_returns_correct_int_when_a_string_is_added_to_an_int()
    {
        assertThat(calculate("3")->plus(2)->equals(), is(identicalTo(5)));
    }

    /**
     * @return void
     */
    public function test_it_can_handle_raising_a_number_to_nth_power()
    {
        assertThat(calculate(2)->toThePower(4), is(equalTo("16")));
    }
}
