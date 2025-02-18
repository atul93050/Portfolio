
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
