<?php

require_once("./classes.php");
require_once("./classes.php");

/*
* @param file name to read from
*
* @return indexed array of each word
*/
function readTextFile(string $fileName): array {
  $contents = file($fileName);

  return $contents;
}

/*
* @param array of words from the text file
*
* @return index of that word from the array of words
*/
function getRandomWord(array $words): string {
  $random = array_rand($words);

  return $words[$random];
}

/*
* @param word to get length of
*
* @return integer of length
*/
function getLengthOfWord(string $word): int {
  $notZeroIndexed = 0;

  for ($i = 1; $i <= strlen($word); $i++) {
    $notZeroIndexed++;
  }
  
  return $notZeroIndexed;
}

/*
* @param word to guess, length of that word, whether the user has guessed a letter or not
*/
function displayWordToUser(
  string $word, 
  int $length, 
  bool $firstGuess
): void {
  echo "\nYour word is...\n\n";

  if (!$firstGuess) {
    echo replaceAllLetters($length);
  } else {
    echo $word;
  }
  echo "\n\n";
}

/*
* @param length of word
*
* @return string of underscores the length which was given
*/
function replaceAllLetters(int $length): string {
  return str_repeat("_ ", $length);
}

/*
* @param the word to be guessed and the users input
*
* @return true or false dependant on if the letter is in the word
*/
function checkLetterNotInWord(string $word, string $letter): bool {
  $inWord = preg_match("/$letter/", $word);

  return $inWord;
}

/*
* @param current guesses that the user has taken
* @param maximum number of guesses
*
* @return message to notify them of how many guesses they have left
*/
function totalGuesses(int $guesses, int $max): string {
  $remaining = $max - $guesses;

  if ($remaining > 1) {
    return "You have $remaining guesses left\n\n";
  } else if ($remaining == 1) {
    return "You have $remaining guess left\n\n";
  } else {
    return "Game Over!!!\n\n";
  }
}


/*
* @param Letter to be checked
*
* @return true if is a letter, false if not
*/
function onlyLetters(string $letter): bool {
  return preg_match("/^\pL+$/u", $letter);
}

/*
* @param array of words which have been guessed
* @param letter to check in array
*
* @return true if letter is in the array
*/
function letterHasBeenGuessed(array $arrayOfLetters, string $letter): bool {
  foreach ($arrayOfLetters as $eachLetter) {
    if ($eachLetter == $letter) {
      return true;
    }
  }
  return false;
}

/*
* @param word to be altered
*
* @return the word with no spaces
*/
function noWhitespace(string $word): string {
  $trimmedWord = str_replace(" ", "", $word);
  return $trimmedWord;
}