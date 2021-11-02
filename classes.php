<?php


class Menu {
  public function display(): int {
    echo "1. Play alone (randomly generated word)\n";
    echo "2. Play 2 player (pick your own word)\n\n";

    $option = readline("\n\nPlease enter your option: ");
    echo "\n\n";

    return $option;
  }
}

class Game {
  private $wordGuessed = false;
  private $gameOver = false;

  public function intro(): void {
    echo "Welcome to Hangman!\nGenerating a word...\n\n";
    sleep(2.5);
  }

  public function setwordGuessed(): void {
    !$this->wordGuessed;
  }

  public function getWordGuessed(): bool {
    return $this->wordGuessed;
  }

  public function setGameOver(): void {
    !$this->gameOver;
  }

  public function getGameOver(): bool {
    return $this->gameOver;
  }
}

class Win extends Game {
  public function congratulateUser(string $word): void {
    echo "\n\n\nYou won!!!\n\n";
    echo "The word you guessed was $word";
  }
}

class Lose extends Game {
  public function badLuck(string $wordToBeGuessed): void {
    echo "\n\n\nOh no!! Too many guesses, better luck next time";
    echo "\n\nThe word you were trying to guess was $wordToBeGuessed\n\n";
  }
}

class Word {
  private $updatedWord;

  public function unveilLetter(string $word, array $lettersGuessed): string {
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