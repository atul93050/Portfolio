<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake Ladder by Grid</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #141E30, #243B55);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            overflow: hidden;
        }

        header,
        footer {
            width: 100%;
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }

        .container {
            width: 80vmin;
            height: 80vmin;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(10, 1fr);
            gap: 2px;
            border-radius: 15px;
            overflow: hidden;
            background: #1e272e;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .item {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            border-radius: 4px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .item:nth-child(odd) {
            background: linear-gradient(to right, #11998e, #38ef7d);
        }

        .item:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .item:nth-child(10n) {
            background: linear-gradient(to right, #fc4a1a, #f7b733);
        }

       
        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .container {
                width: 90vmin;
                height: 90vmin;
            }

            .item {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.5rem;
            }

            .container {
                width: 95vmin;
                height: 95vmin;
            }

            .item {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header>
        <h1>Snake and Ladder Game</h1>
    </header>

    <!-- Game Container -->
    <div class="container" id="grid"></div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 | Developed by Atul Verma</p>
    </footer>

    <script>
        const gridContainer = document.getElementById('grid');
        for (let i = 1; i <= 100; i++) {
            const item = document.createElement('div');
            item.className = 'item';
            item.textContent = i;
            gridContainer.appendChild(item);
        }
    </script>
</body>

</html>
