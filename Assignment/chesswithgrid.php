<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard by grid</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #2a2a2e;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

   
        header,
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            width: 90%;
            font-size: 1.5rem;
            border-radius: 8px;
            margin: 10px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }

        footer {
            font-size: 1rem;
            margin-top: auto;
        }

     
        .container {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(8, 1fr);
            border: 3px solid #444;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
            width: 80%;
            max-width: 500px;
            aspect-ratio: 1;
            margin: 20px 0;
            overflow: hidden;
        }

        .black {
            background-color: #4b4b5a;
            transition: all 0.3s ease;
        }
        .black:hover{
            transform: scale(1.1);
            transition: all 0.5s ease;
            cursor: pointer;
        }

        .white {
            background-color: #e0e0e0;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .white:hover{
            transform: scale(1.1);
            transition: all 0.5s ease;
        }


        @media (max-width: 768px) {
            header,
            footer {
                font-size: 1.2rem;
            }

            .container {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            header,
            footer {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        Chessboard
    </header>

    <div class="container">
       
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>

        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>

        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>

        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>

        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>

        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>

        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>

        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
        <div class="white"></div>
        <div class="black"></div>
    </div>

    <footer>
        Chessboard Layout | Designed with Grid
    </footer>
</body>

</html>
