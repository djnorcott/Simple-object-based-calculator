<?php

/**
 * This is just a simple extension showing you can have a new class that does everything another one does
 * and adds more. An instance of ScientificCalculator can do everything a Calculator can do, but also anything it
 * has methods for itself.
 */
class ScientificCalculator extends Calculator
{
    public function power($first_number, $second_number)
    {
        return pow($first_number, $second_number);
    }
}