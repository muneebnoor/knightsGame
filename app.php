<?php

require_once 'knightsGame.php';

function main()
{
    // Game will run with 6 knights (default number of knights)
    $game1 = new KnightsGame();
    $game1->displayWinner();

    // Game will run with 1 knight and the solo knight will be declared as the winner
    $game2 = new KnightsGame(1);
    $game2->displayWinner();

    $game3 = new KnightsGame(4);
    $game3->displayWinner();

    $game4 = new KnightsGame(8);
    $game4->displayWinner();

    $game5 = new KnightsGame(12);
    $game5->displayWinner();
}

main();
