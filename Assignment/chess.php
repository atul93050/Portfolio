<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            font-family: 'Arial', sans-serif;
        }

        header, footer {
            width: 100%;
            background-color: rgb(77, 42, 5);
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
        }

        footer {
            font-size: 1rem;
            margin-top: 20px;
        }

        #board-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            perspective: 1000px;
        }

        #outer {
            width: 80vw;
            max-width: 600px;
            height: 80vw;
            max-height: 600px;
            display: flex;
            flex-wrap: wrap;
            background: transparent;
            border-radius: 5px;
            outline: 3px solid rgb(77, 42, 5);
            outline-offset: 13px;
            transition: transform 0.5s ease;
        }

        .square {
            width: 12.5%;
            aspect-ratio: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.5s ease;
        }

        .square:hover {
            transform: scale(1.1);
            transition: transform 0.2s ease;
        }

        .white {
            background-color: white;
            border: 3px solid white;
            border-radius: 13px;
            box-shadow: rgba(255, 255, 255, 0.25) 0px 50px 100px -20px inset,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(56, 56, 56, 0.35) 0px -2px 6px 0px inset;
        }

        .brown {
            background-color: rgb(77, 42, 5);
            border: 3px solid white;
            border-radius: 13px;
            box-shadow: rgba(77, 42, 5, 0.25) 0px 50px 100px -20px inset,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(77, 42, 5, 0.35) 0px -2px 6px 0px inset;
        }

        .player-icons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin: 20px 0;
        }

        .player {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: rgb(77, 42, 5);
        }

        .player img {
            width: 80px;
            height: 80px;
            border-radius: 10%;
            border: 3px solid rgb(77, 42, 5);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .player img:hover {
            transform: scale(1.2) rotateZ(10deg);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <header>
        Let's Play Chess
    </header>

    <div id="board-container">
        <div class="player-icons">
            <div class="player">
                <img src="https://via.placeholder.com/80" alt="Player 1">
                Player 1
            </div>
            <div class="player">
                <img src="https://via.placeholder.com/80" alt="Player 2">
                Player 2
            </div>
        </div>
        <div id="outer">
           
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>

            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>

            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>

            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>

            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>

            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>

            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>

            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
            <div class="square brown"></div>
            <div class="square white"></div>
        </div>
    </div>

    <footer>
        Designed By Atul Verma | Enjoy The Game 
    </footer>
</body>

</html>
