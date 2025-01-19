<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Game</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(135deg, #8e44ad, #3498db);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }


        header {
            background-color: #2c3e50;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 1.8rem;
            margin: 0;
            color: #ecf0f1;
        }

        header nav a {
            color: #ecf0f1;
            text-decoration: none;
            margin-left: 15px;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #2ecc71;
        }

 
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 30px;
            width: 90%;
            max-width: 600px;
            padding: 20px;
            margin: 20px auto;
        }

            .container div {
            background-color: #2ecc71;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
            text-align: center;
            border-radius: 50%;
            height: 120px;
            width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

         .container div:hover {
            background-color: #27ae60;
            transform: scale(1.15) rotate(5deg);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

      
        #in {
            margin-top: 20px;
            padding: 15px 25px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            background-color: #ecf0f1;
            border: 3px solid #2ecc71;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 20px auto;
        }

     
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px 20px;
            text-align: center;
            font-size: 0.9rem;
            margin-top: auto;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: #2ecc71;
            text-decoration: none;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #fff;
        }

        
        @media (max-width: 768px) {
            .container div {
                height: 90px;
                width: 90px;
                font-size: 1.1rem;
            }

            #in {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.5rem;
            }

            .container {
                gap: 15px;
            }

            .container div {
                height: 75px;
                width: 75px;
                font-size: 1rem;
            }

            #in {
                font-size: 1.2rem;
                padding: 10px 15px;
            }
        }
    </style>
</head>

<body>
   
    <header>
        <h1>Name Game</h1>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <div class="container">
        <div onclick="out('Ram')">Ram</div>
        <div onclick="out('Shyam')">Shyam</div>
        <div onclick="out('Hari')">Hari</div>
        <div onclick="out('Ved')">Ved</div>
        <div onclick="out('Prakash')">Prakash</div>
        <div onclick="out('Sasaram')">Sasaram</div>
    </div>

  
    <div id="in">Click any name to display it here!</div>

  
    <footer>
        <p>&copy; 2025 Designed by Atul Verma. All Rights Reserved. | <a href="#privacy">Privacy Policy</a></p>
    </footer>

    <script>
        
        function out(name) {
            document.getElementById('in').innerHTML = `You selected: ${name}`;
        }
    </script>
</body>

</html>
