<?php

require("./classes.php");

/*
* @param file name to read from
*
* @return indexed array of each word
*/
function readTextFile(string $fileName): array {
  $contents = file($fileName);

  return $contents;
}

function startGame() {
  $newGame = new Game();
  $startMenu = new Menu();

  $newGame::startGame();
  $startMenu::display();
}