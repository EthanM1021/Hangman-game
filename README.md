# Hangman-game 

For my advanced programming project, I have decided to implement the game of hangman. Hangman is where a player guesses a word which is chosen by another player. The guesser gets to know the length of the word and tries to guess the word in a certain number of attempts. On every wrong guess, a drawing of a hanging man increases until it is a full drawing. Once the drawing is complete, the game is over unless the player wins beforehand. 

For this project, I have developed it fully in PHP. This is the language in which we use in the workplace so I am familiar with this.

For this project, some of the main challenges which I encountered were:
 - How to store the state of the word
 - How to display the current hanged man image
 - A way to store all the guessed letters so far
 - Don't allow the user to guess the same letter twice
 - Ensure only letters are entered from the user
 - A way to store the guesses
 - If guesses have been reached, end game
 - Decide the win/lose state of the game

Here is my flow diagram for my program:

When starting this project, the initial plan was to write pseudocode to split each point above into smaller steps. I also planned to do one step as a commit to this repository. For example, when finding a way to store the word in a suitable fashion, that would be one commit. Then if later in the project, I saw there was a better way to store it which would make the code either:
 - More readable
 - Easier to access/change/update
 - If the current way didn't work how I intended it to

When designing a project like this where I need to adapt object orientated programming (OOP) into this. Since working with OOP for this project, I have found various benefits:
 - It makes it easier to reuse code
 - It provides a clear structure for my program (i.e. all my classes in one file, functions in another etc.)
 - Having it in different files also made debugging easier as I could see where the problem was coming from
 - Data redundancy - In PHP you can have public private and protected methods.

This allows a variable/function to keep the scope of it's lifetime to a limit. The difference betweene ach scope is:
 - Public - this can be accessed from anywhere, other classes, files, other instances of the object
 - Private - Can only be accessed in it's own class
 - Protected - Can be accessed in all classes which inherit and including the parent class

For this project, I decided to have 2 parent classes. One for the game which in turn would have two instansiations which are the win and lose states of the game. Another class which will keep the state of the word. 

For the standards of this project. I have ensured to maintain consistency in the naming conventions of functions, variables etc. I have chosen to write these in camel case e.g. thisIsAFunction. Camel case consists of every first letter of a word is uppercase apart from the first word. This is useful as a function or variable name cannot contain spaces so this is effectively a way of making the function name readable.
I have also made it so that the function names are readable and are in relation to what they are doing. For example, in my code:
```
function letterHasBeenGuessed(array $arrayOfLetters, string $letter): bool {
  foreach ($arrayOfLetters as $eachLetter) {
    if ($eachLetter == $letter) {
      return true;
    }
  }
  return false;
}
```
I have made it so the function name is letterHasBeenGuessed is because it evaluates to a boolean. I then invoke this function in the main.php file inside an if statement:
```
if (letterHasBeenGuessed($guessedLetters, $guessedLetter)) {
    echo "You have already entered $guessedLetter\n\n";
    goto getUserInput;
  }
```
So now, this makes it readable as it now reads in plain english if letter has been guessed. I find this much more readable than potentially something like if letter in array.

Also, referring back to the function, I have made it so my code is "one line, one instruction" (OLOI). 
The first line is defining the function with appropriate name and parameters.
The second line loops through the array
The third line checks if the letter is in the array
The fourth line returns true if the letter is in the array
The fifth line closes the if statement
The sixth line closes the foreach loop
The seventh line returns false if the if statement resolves to false

Having OLOI makes the code much easier to read than if all seven of those lines were on one line. I also find this method easier to debug. If my code fails for some reason, I can then go through each line and see where exactly it is going wrong.

I have also tried my best to make most, if not all of my functions pure. A pure function is a function that if it is given the same input, it will **always** return the same output. Another example within my code would be:
```
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
```

If I break down the function declaration parameters it reads (int $guesses, int $max): string...
The int before $guesses and $max declares what type that parameter should be. So, only integers are being able to be passed into this function. If not, then a PHP type error occurs. Then after the parameter brakcets there is a colon and a string. This is to state the return value. As you can see, there is a possiblity of three different outcomes, so there are a potential of three different outcomes but either way, each one is a string
The comment above the function is explaining the parameters (@param) which are getting input to the function and also the return (@return) value. This is used quite often in PHP and also in my workplace and I think it looks great as it tells you what it is taking in and returning before actually reading the function.

If I was to walk through this function line by line:
 - Function declaration with parameters
 - It then works out the remaining guesses in which the user has left
 - If statement to see if there is more than one guess
 - If this is fulfilled - return the output message for the user
 - If not fulfilled, it then checks if the remaining guesses is equal to 1
 - If still not fulfilled, the default message would be game over.

This is a pure function as if you were to pass 6 and 10 into this function x amount of times. The remaining variable would always be 4 and therefore, the first return statement would always return as seen below:
```
totalGuesses(6, 10);
totalGuesses(6, 10);
totalGuesses(6, 10);
totalGuesses(6, 10);

// Output will always be:
You have 4 guesses left
You have 4 guesses left
You have 4 guesses left
You have 4 guesses left
```

















