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
