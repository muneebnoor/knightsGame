<?php

class Knight
{
    private int $healthPoints;
    private static int $idIncrementor = 1;
    private string $id;

    public function __construct(int $healthPoints = 100)
    {
        $this->healthPoints = $healthPoints;
        $this->id = static::$idIncrementor;
        static::$idIncrementor++;
    }

    public function removeHealthPoints($points)
    {
        $this->healthPoints -= $points;
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function flush(){
        static::$idIncrementor = 1;
    }
}
