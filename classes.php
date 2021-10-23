<?php

class Game {
  public function startGame() {
    echo "Welcome to hangman!\n\n";
  }
}

class Menu {
  public function display(): int {
    echo "1. Play alone (randomly generated word)\n";
    echo "2. Play 2 player (pick your own word)\n\n";

    // echo "Press the number in which you want to play: ";

    $type = readline("Press the number in which you want to play: ");

    return $type;
  }

}