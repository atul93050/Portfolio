<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolling Dice Game</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #f7f7f7;
            color: #333;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: #2196f3;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        footer {
            background-color: #2196f3;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            background: linear-gradient(135deg, #6e7fef, #91c3eb);
            padding: 20px;
        }

        .box {
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            min-width: 350px;
        }

        h1 {
            font-size: 36px;
            color: #2e3b8f;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 20px;
            color: #2e3b8f;
        }

        h2 {
            font-size: 24px;
            color: #4caf50;
            margin-top: 20px;
        }

        #turn {
            font-weight: bold;
            color: #f44336;
        }

        .dice-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
        }

        .dice {
            width: 100px;
            height: 100px;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .dice img {
            width: 80%;
            height: 80%;
        }

        .dice:hover {
            transform: scale(1.1);
            border-color: #2196f3;
        }

        button {
            background-color: #2196f3;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 7px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1976d2;
        }

        button:active {
            background-color: #1565c0;
        }

        @media (max-width: 768px) {
            .box {
                padding: 20px;
            }

            .dice-container {
                gap: 15px;
            }

            .dice {
                width: 80px;
                height: 80px;
            }

            h1 {
                font-size: 30px;
            }

            h2 {
                font-size: 20px;
            }

            h3 {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .box {
                padding: 15px;
            }

            .dice-container {
                flex-direction: column;
                gap: 10px;
            }

            .dice {
                width: 70px;
                height: 70px;
            }

            h1 {
                font-size: 26px;
            }

            h2 {
                font-size: 18px;
            }

            h3 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <header>
        Rolling Dice Game
    </header>

    <div class="container">
        <div class="box">
            <h1>Rolling Dice Game</h1>
            <h3>Total turns: 5</h3>
            <h3>Remaining turns: <span id="turn">5</span></h3>
            <div class="dice-container">
                <div class="dice"><img src="../image/dice.png" alt="Dice 1" id="img1"></div>
                <div class="dice"><img src="../image/dice.png" alt="Dice 2" id="img2"></div>
            </div>

            <button id="Roll">Roll Dice</button>
            <h2>Score: <span id="result">0</span></h2>
        </div>
    </div>

    <footer>
        &copy; 2025 Rolling Dice Game | All Rights Reserved
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const dice1 = document.getElementById('img1');
            const dice2 = document.getElementById('img2');
            const scoreDisplay = document.getElementById('result');
            const remainingTurnsDisplay = document.getElementById('turn');
            const rollButton = document.getElementById('Roll');

            let turn = 5;
            let totalScore = 0;

            function rollDice() {
                if (turn === 0) {
                    scoreDisplay.innerHTML = `Game Over! Your final score is ${totalScore}`;
                    rollButton.innerHTML = 'Restart Game';
                    rollButton.removeEventListener('click', rollDice);
                    rollButton.addEventListener('click', restartGame);
                    return;
                }

                // Randomly generate dice numbers (1 to 6)
                const number1 = Math.floor(Math.random() * 6) + 1;
                const number2 = Math.floor(Math.random() * 6) + 1;

                dice1.src = `../image/dice${number1}.png`;
                dice2.src = `../image/dice${number2}.png`;

                // Add the rolled numbers to the total score
                totalScore += number1 + number2;
                scoreDisplay.innerHTML = totalScore;

                turn--;
                remainingTurnsDisplay.innerHTML = turn;
            }

            function restartGame() {
                turn = 5;
                totalScore = 0;
                scoreDisplay.innerHTML = totalScore;
                remainingTurnsDisplay.innerHTML = turn;

                dice1.src = `../image/dice.png`;
                dice2.src = `../image/dice.png`;

                rollButton.innerHTML = 'Roll Dice';
                rollButton.removeEventListener('click', restartGame);
                rollButton.addEventListener('click', rollDice);

                rollButton.disabled = false;
            }

            rollButton.addEventListener('click', rollDice);
        });
    </script>
</body>

</html>
