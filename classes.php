<?php

// class Menu {
  // public function display(): int {
  //   echo "1. Play alone (randomly generated word)\n";
  //   echo "2. Play 2 player (pick your own word)\n\n";

  //   $type = readline("Press the number in which you want to play: ");

  //   return $type;
  // }

// }

class ThinkOfAName {
  private $updatedWord;

  public function unveilLetter(string $word, string $letter) {
    for ($i = 0; $i < strlen($word); $i++) {
        if ($word[$i] == $letter) {
          $this->updatedWord .= $letter .= " ";
        } else {
          $this->updatedWord .= "_ ";
        }
    }
    return $this->updatedWord;
  }
}