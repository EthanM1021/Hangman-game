<?php

require_once("./classes.php");
require_once("./classes.php");

function startGame(): void {
  // $startMenu = new Menu();
}

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
* @param length of word
*
* @return string of underscores the length which was given
*/
function replaceAllLetters(int $length): string {
  return str_repeat("_ ", $length - 1);
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

function removeLetterFromAlphabet(string $letter) {
  
}