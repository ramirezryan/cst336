var randNum = Math.floor(Math.random() * 99) + 1;
var winField = document.querySelector('#wins');
var lossField = document.querySelector('#losses');
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHigh = document.querySelector('#lowOrHigh');

var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

var guessCount = 1;
var totalWins = 0;
var totalLosses = 0;
var resetBtn = document.querySelector('#reset');
resetBtn.style.display = 'none';


guessField.focus(); // Target the cursor at the input box.

function checkGuess() {
    var userGuess = Number(guessField.value);
    if (guessCount === 1) {
        $('#guesses').html('Previous Guesses: ');
    }
    $('#guesses').append(userGuess + ' ');
    
    if (userGuess === randNum) {
        $('#lastResult').html('Congratulations! You guessed the right number!');
        $('lastResult').css("background-color", green);
        $('lowOrHigh').html('');
        totalWins += 1;
        setGameOver();
    } else if (guessCount === 7) {
        lastResult.innerHTML = 'Sorry, you lost!';
        totalLosses += 1;
        setGameOver();
    } else {
        lastResult.innerHTML = 'Wrong!';
        lastResult.style.backgroundColor = 'red';
        if (userGuess < randNum) {
            lowOrHigh.innerHTML = 'Too low';
        } else if (userGuess > randNum) {
            lowOrHigh.innerHTML = 'Too high.';
        }
    }
    
    if (userGuess > 99) {
        lowOrHigh.innerHTML = "do not go past 99!";
        return;
    } else {
        guessCount++;
        guessField.value = '';
        guessField.focus();
    }
}

guessSubmit.addEventListener('click', checkGuess);

function setGameOver() {
    winField.innerHTML = 'Wins: ' + totalWins;
    lossField.innerHTML = 'Losses: ' + totalLosses;
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetBtn.style.display = 'inline';
    resetBtn.addEventListener('click', resetGame);
}

function resetGame() {
    guessCount = 1;
    
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0; i < resetParas.length; i++) {
        resetParas[i].textContent = '';
    }
    
    resetBtn.style.display = 'none';
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    lastResult.style.backgroundColor = 'white';
    
    randNum = Math.floor(Math.random() * 99) + 1;
}
