# Expressive Maths #

This is a lightweight PHP library for performing simple mathematical operations in an expressive way.

## Installation ##

Install with composer:
`$ composer require garethellis/expressive-maths`

## Usage ##

All operations are performed in the `Number` class. You can either work directly with this class or use
the supplier convenience functions for extra expressiveness!

### Working directly with Number class ###

Simply instantiate an create of `Number` by passing any numeric value as a string, float or int:

```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("5");
```

The `Number` class has a number of public methods for performing operations on the current value. All
operations return a new instance of `Number`.

#### Addition ####

You can use the method `Number::plus()` or its alias `Number::add()`:
```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("5");
var_dump($number->plus("5")); //(string) "10"
```

#### Subtraction ####

You can use the method `Number::minus()` or its alias `Number::subtract()`:
```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("5");
var_dump($number->minus("2")); //(string) "3"
```

#### Multiplication ####

You can use the method `Number::times()` or its alias `Number::multipliedBy()`:
```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("5");
var_dump($number->times("7")); //(string) "35"
```

#### Division ####

You can use the method `Number::dividedBy()`:
```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("27");
var_dump($number->dividedBy("9")); //(string) "3"
```

**Note**: division will return `null` if you pass in a zero value to `Number::dividedBy()`.

#### Percentages ####

To calculate the value of the current `Number` as a percentage of another, 
use the method `Number::asAPercentageOf()`:
```php
<?php
use Garethellis\ExpressiveMaths;

$number = new Number("5");
var_dump($number->asAPercentageOf("20")); //(string) "25"
```

**Note**: calculating a percentage will return `null` if you pass in a zero value to `Number::asAPercentage()`.

#### Other ####

Other methods are available:
- `Number::squared()`

### Helper functions ###

For extra expressiveness, you can use the helper functions `calculate()` and `whatIs()`. This is the 
recommended way of using this library.
These functions are identical in functionality - which you use is entirely up to you. Both functions return 
an instance of `Number`.

```php
<?php
use function Garethellis\ExpressiveMaths\calculate;

$newValue = calculate(6)->multipliedBy(3);
```


### Working with the result of an operation ###

All operations return a new instance of `Number`. This class implements `__toString()` so you can echo
out the resulting value if you wish:

```php
<?php
use function Garethellis\ExpressiveMaths\calculate;

echo calculate(2)->plus(2);
//this will echo "4"
```

In addition there is a getter method on `Number` if you wish to get the value and do something else with it,
or simply want to leave it as an int, float or whatever:

```php
<?php
use function Garethellis\ExpressiveMaths\calculate;

var_dump(calculate(2)->plus(2)->getValue()); //(int) 4
```