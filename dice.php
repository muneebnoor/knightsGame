<?php

class Dice
{
    private static $diceValue = 0;

    public static function roll()
    {
        static::$diceValue = random_int(1, 6);
        return static::$diceValue;
    }

    public static function getDiceValue()
    {
        return static::$diceValue;
    }

    public static function flush(){
        static::$diceValue = 0;
    }
}
