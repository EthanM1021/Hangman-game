<?php

require("./function.php");

startGame();

$wordsArray = readTextFile("./words.txt");

getRandomWord($wordsArray);

