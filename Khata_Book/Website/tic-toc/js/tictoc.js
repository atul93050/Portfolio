
let board = document.getElementById('board');
let startbutton = document.getElementById('button');
let player1 = document.getElementById('player1name');
let player2 = document.getElementById('player2name');
let status = document.getElementById('player1');
let status2 = document.getElementById('player2');
let radio1=document.getElementById('1_player');
let radio2=document.getElementById('2_player');
let ai = false;

startbutton.innerHTML = "Start";
_player();

function _player() {
    radio1.addEventListener('click', () => {
        player2.style.display = "none"; 
                         
    });

    radio2.addEventListener('click', () => {
        player2.style.display = "inline-block";                    
                                
    });
}



function aimove() {

    let box;
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

        if (!checkwinner("O")) {
            turn++;
            status.innerHTML = player1.value + "'s Turn"
        }
        else {
            disableboard();
            status2.innerHTML = player2.value + " Won!";
            status.innerHTML = player1.value + " Lost!";
        }
    }
}




startbutton.addEventListener('click', () => {
    if (player1.value === "") {
        alert("Please enter your name");
        return;
    }
    if (player2.value === "") {
        player2.value = "AI";
        ai = true;
    }
    else {
        ai = false;

    }
    if (startbutton.innerHTML === "Start") {
        createboard();
        status.innerHTML = player1.value + "'s Turn ";
        startbutton.innerHTML = "Reset";
    }
    else {
        resetboard();
    }

})
function createboard() {
    board.innerHTML = "";

    for (let i = 1; i <= 9; i++) {
        board.innerHTML += "<div class='cell' id='" + i + "' onclick='press(" + i + ")''></div>";
    }
    turn = 1;
    status.innerHTML = "";


}


function resetboard() {
    createboard();
    button.innerHTML = "Reset";
    turn = 1;
    status.innerHTML = "";
    status2.innerHTML = "";
}






let turn = 1;
function press(id) {
    let box = document.getElementById(id);
    if (turn > 9) {
        status.innerHTML = "It's a Draw! <br> Well played.";
        return;
    }
    else {
        if (turn % 2 == 0 && ai === true) {

            setTimeout(aimove, 500);

            box.innerHTML = "O";


            box.onclick = null;

            if (!checkwinner(box.innerHTML)) {

                status.innerHTML = player1.value + "'s Turn";
                status2.innerHTML = "";
            }
            else {
                disableboard();
                status2.innerHTML = player2.value + " Won";
                status.innerHTML = player1.value + " Loose";
            }

        }
        if (turn % 2 == 0) {


            box.innerHTML = "O";

            box.onclick = null;

            if (!checkwinner(box.innerHTML)) {

                status.innerHTML = player1.value + "'s Turn";
                status2.innerHTML = "";
            }
            else {
                disableboard();
                status2.innerHTML = player2.value + " Won";
                status.innerHTML = player1.value + " Loose";
            }



        }
        else {
            let box = document.getElementById(id);
            box.innerHTML = "X";
            box.onclick = null;

            if (!checkwinner("X")) {

                if (ai === true && turn <= 9) {
                    status.innerHTML = "AI's Turn"
                    setTimeout(aimove, 500);
                }
                else {
                    status2.innerHTML = player2.value + "'s turn ";
                    status.innerHTML = "";
                }



            }
            else {
                disableboard();
                status.innerHTML = player1.value + " Won!";
                status2.innerHTML = player2.value + " Lost!";

            }
        }
        turn++;
    }
}

// board ko disable karne ke liye win hone ke bad
function disableboard() {
    let box;
    for (let i = 1; i <= 9; i++) {
        box = document.getElementById(i);
        box.onclick = null;
    }
}

// winning style ko highlight karne ke liye
function high_light(a, b, c) {

    box1 = document.getElementById(a).classList.add('zoom');
    box2 = document.getElementById(b).classList.add('zoom');
    box3 = document.getElementById(c).classList.add('zoom');

}

// box ki id get karne ke liye 
function getid(id) {
    let box = document.getElementById(id);
    return box.innerHTML;
}

//winner check karne ke liye

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
