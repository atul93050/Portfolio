let board = document.getElementById('board'); // board
let button = document.getElementById('button'); // button
let player1 = document.getElementById('player1name'); // player 1
let player2 = document.getElementById('player2name'); // player 2
let Player1_status = document.getElementById('Player1_status'); // Player1 Status
let Player2_status = document.getElementById('Player2_status'); // Player2 Status
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
        player2.style.display = "none";
    });

    radio2.addEventListener('click', () => {
        player2.style.display = "inline-block";
    });
}

// AI code
function aimove() {
    let availablebox = [];
    for (let i = 1; i <= 9; i++) {
        let box = document.getElementById(i);
        if (box.innerHTML === "") {
            availablebox.push(i);
        }
    }

    if (availablebox.length > 0) {
        let random = Math.floor(Math.random() * availablebox.length);
        let move = availablebox[random];
        let box = document.getElementById(move);
        box.innerHTML = "O";

        if (checkwinner("O")) {
            disableboard();
            Player2_status.innerHTML = player2.value + " Won!";
            Player1_status.innerHTML = player1.value + " Lost!";
        } else {
            turn++;
            Player1_status.innerHTML = player1.value + "'s Turn";
        }
    }
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
    } else {
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

// Handle a cell press
function press(id) {
    let box = document.getElementById(id);
    if (box.innerHTML !== "") return; // Prevent a cell from being clicked twice

    // Player's move
    if (turn % 2 !== 0) {
        box.innerHTML = "X";
        if (checkwinner("X")) {
            disableboard();
            Player1_status.innerHTML = player1.value + " Won!";
            Player2_status.innerHTML = player2.value + " Lost!";
        } else {
            turn++;
            Player2_status.innerHTML = player2.value + "'s Turn";
            Player1_status.innerHTML = "";
            if (ai) {
                setTimeout(aimove, 500); // AI's turn after a delay
            }
        }
    } else {
        // AI's move
        box.innerHTML = "O";
        if (checkwinner("O")) {
            disableboard();
            Player2_status.innerHTML = player2.value + " Won!";
            Player1_status.innerHTML = player1.value + " Lost!";
        } else {
            turn++;
            Player1_status.innerHTML = player1.value + "'s Turn";
            Player2_status.innerHTML = "";
            if (ai) {
                setTimeout(aimove, 500); // AI's turn after a delay
            }
        }
    }

    // Check if the game is a draw
    if (turn > 9 && !checkwinner("X") && !checkwinner("O")) {
        alert("It's a draw!");
        resetboard();
    }
}

// Disable the board after a winner is found
function disableboard() {
    let box;
    for (let i = 1; i <= 9; i++) {
        box = document.getElementById(i);
        box.onclick = null;
    }
}

// winning style ko highlight karne ke liye
function high_light(a, b, c) {
    document.getElementById(a).classList.add('zoom');
    document.getElementById(b).classList.add('zoom');
    document.getElementById(c).classList.add('zoom');
}

// box ki id get karne ke liye 
function getid(id) {
    let box = document.getElementById(id);
    return box.innerHTML;
}

// winner check karne ke liye
function checkwinner(player) {
    if (player == getid('1') && player == getid('2') && player == getid('3')) {
        high_light(1, 2, 3);
        return true;
    }
    if (player == getid('4') && player == getid('5') && player == getid('6')) {
        high_light(4, 5, 6);
        return true;
    }
    if (player == getid('7') && player == getid('8') && player == getid('9')) {
        high_light(7, 8, 9);
        return true;
    }
    if (player == getid('1') && player == getid('4') && player == getid('7')) {
        high_light(1, 4, 7);
        return true;
    }
    if (player == getid('2') && player == getid('5') && player == getid('8')) {
        high_light(2, 5, 8);
        return true;
    }
    if (player == getid('3') && player == getid('6') && player == getid('9')) {
        high_light(3, 6, 9);
        return true;
    }
    if (player == getid('1') && player == getid('5') && player == getid('9')) {
        high_light(1, 5, 9);
        return true;
    }
    if (player == getid('3') && player == getid('5') && player == getid('7')) {
        high_light(3, 5, 7);
        return true;
    }
}
