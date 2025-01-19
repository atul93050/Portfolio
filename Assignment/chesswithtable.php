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

        
        table {
            border-spacing: 0;
            border-collapse: collapse;
            border: 4px solid #f4b400;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        td {
            width: 80px;
            height: 80px;
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

            td {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-width: 480px) {
            header,
            footer {
                font-size: 1rem;
            }

            td {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>

<body>

    <header>
        Welcome to the Chessboard
    </header>

    <table>
        <tbody>
            <!-- Row 1 -->
            <tr>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
            </tr>
            <!-- Row 2 -->
            <tr>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
            </tr>
            <!-- Row 3 -->
            <tr>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
            </tr>
            <!-- Row 4 -->
            <tr>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
            </tr>
            <!-- Row 5 -->
            <tr>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
            </tr>
            <!-- Row 6 -->
            <tr>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
            </tr>
            <!-- Row 7 -->
            <tr>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
            </tr>
            <!-- Row 8 -->
            <tr>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
                <td class="white"></td>
                <td class="black"></td>
            </tr>
        </tbody>
    </table>

    <footer>
        Created with ♥ and using table | ChessBoard by Atul Verma
    </footer>

</body>

</html>
