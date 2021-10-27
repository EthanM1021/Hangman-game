<?php

// class Menu {
  // public function display(): int {
  //   echo "1. Play alone (randomly generated word)\n";
  //   echo "2. Play 2 player (pick your own word)\n\n";

  //   $type = readline("Press the number in which you want to play: ");

  //   return $type;
  // }

// }

class Word {
  private $updatedWord;

  public function unveilLetter(string $word, array $lettersGuessed) {
    $newWord = "";
    for ($i = 0; $i < strlen($word) - 1; $i++) {
      if ($word[$i] == in_array($word[$i], $lettersGuessed)) {
        $newWord .= $word[$i] . " ";
      } else {
        $newWord .= "_ ";
      }
    }
    $this->updatedWord = $newWord;
    return $this->updatedWord;
  }
}