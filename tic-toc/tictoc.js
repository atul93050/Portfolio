let board = document.getElementById('board'); 
let button = document.getElementById('button'); 
let player1 = document.getElementById('player1name'); 
let player2 = document.getElementById('player2name'); 
let Player1_status = document.getElementById('Player1_status'); 
let Player2_status = document.getElementById('Player2_status');
let radio1 = document.getElementById('1_player');
let radio2 = document.getElementById('2_player');
let choose = document.getElementById('input');

// initialization
let ai = false;
let turn = 1;
button.innerHTML = "Start";

show_input();

function show_input() {
    radio1.addEventListener('click', () => {
        player1.style.display = "inline-block";
        player2.style.display = "none";
    });

    radio2.addEventListener('click', () => {
        player1.style.display = "inline-block";
        player2.style.display = "inline-block";
    });
}

// Start or Reset the Game
button.addEventListener('click', () => {
    if (player1.value === "") {
        alert("Please enter your name");
        return;
    }

    if (player2.value === "" && radio1.checked) {
        player2.value = "AI";
        ai = true;
    } else if (player2.value === "" && !radio1.checked) {
        alert("Please enter Player 2's name");
        return;
    } else {
        ai = false;
    }

    if (button.innerHTML === "Start") {
        createboard();
        Player1_status.innerHTML = player1.value + "'s Turn";
        button.innerHTML = "Reset";
        choose.style.display = "none"; // Hide the "Choose Player" field after starting the game
        // Hide the "Choose Player" field after starting the game
        choose.style.display = "none";
        choose.style.display = "flex";
        resetboard();
    }
});

// Create the game board
function createboard() {
    board.innerHTML = "";
    for (let i = 1; i <= 9; i++) {
        board.innerHTML += "<div class='cell' id='" + i + "' onclick='press(" + i + ")'></div>";
    }
    turn = 1;
    Player1_status.innerHTML = "";
    Player2_status.innerHTML = "";
}

// Reset the game
function resetboard() {
    show_input();
    choose.style.display = "block";
    createboard();
    button.innerHTML = "Start";
    turn = 1;
    Player1_status.innerHTML = "";
    Player2_status.innerHTML = "";
    radio1.checked = false;
    radio2.checked = false;
    player1.value = "";
    player2.value = "";
    player2.style.display = "inline-block";
}