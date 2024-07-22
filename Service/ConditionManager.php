<?php

class ConditionManager
{
    public function isPotencyOfTwo($number): bool
    {
        if (!is_numeric($number) || $number <= 1) {
            return false;
        }
        //automatic conversion to binary due to &
        return ($number & ($number - 1)) === 0;

        /*
         * 7 in binary = 0111               8 = 1000                every potency of stand is in binary a 1 (with some 0 at the end)
         * 6 in binary = 0110 = 0110        7 = 0111 = 0000
         *
         * 1&1 = 1      |1
         * 1&0 = 0      |1
         * 0&1 = 0      |1
         * 0&0 = 0      |0
         */
    }
}