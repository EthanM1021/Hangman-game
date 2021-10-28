<?php

class Game {
  private $wordGuessed = false;
  private $gameOver = false;

  public function intro() {
    echo "Welcome to Hangman!\nGenerating a word...\n\n";
    sleep(2.5);
  }

  public function setwordGuessed() {
    return !$this->wordGuessed;
  }

  public function getWordGuessed() {
    return $this->wordGuessed;
  }

  public function setGameOver() {
    return !$this->gameOver;
  }

  public function getGameOver() {
    return $this->gameOver;
  }
}

class Win extends Game {
  public function congratulateUser() {
    echo "\n\n\nYou won!!!";
  }
}

class Lose extends Game {
  public function badLuck(string $wordToBeGuessed) {
    echo "\n\n\nOh no!! Too many guesses, better luck next time";
    echo "\n\nThe word you were trying to guess was $wordToBeGuessed";
  }
}

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

