<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChessBoard</title>
    <style>
       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #1c1c1e;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        header,
        footer {
            background-color: #2c2c2e;
            color: #fff;
            text-align: center;
            padding: 15px;
            width: 100%;
            font-size: 1.5rem;
            border-radius: 8px;
        }

        footer {
            margin-top: auto;
            font-size: 1rem;
        }

   
        .chessboard {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            width: 80vmin;
            height: 80vmin;
            border: 4px solid #f4b400;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .chessboard div {
            width: 100%;
            height: 100%;
        }

        .black {
            background-color: #555555;
        }

        .white {
            background-color: #f5f5f5;
        }

      
        @media (max-width: 768px) {
            header,
            footer {
                font-size: 1.2rem;
            }

            .chessboard {
                width: 90vmin;
                height: 90vmin;
            }
        }

        @media (max-width: 480px) {
            header,
            footer {
                font-size: 1rem;
            }

            .chessboard {
                width: 100vmin;
                height: 100vmin;
            }
        }
    </style>
</head>

<body>

    <header>
        Welcome to the Chessboard
    </header>

    <div class="chessboard">
       <script>
            const chessboard = document.querySelector('.chessboard');
            for (let row = 0; row < 8; row++) {
                for (let col = 0; col < 8; col++) {
                    const box = document.createElement('div');
                    box.className = (row + col) % 2 === 0 ? 'white' : 'black';
                    chessboard.appendChild(square);
                }
            }
        </script>
    </div>

    <footer>
        Created with ♥ | ChessBoard by Atul Verma
    </footer>

</body>

</html>
