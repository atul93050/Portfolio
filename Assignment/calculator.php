<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .orange {
            background-color: #ff3800e0;
        }

        .green {
            color: #33bea0;
        }

        body {
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(45deg, #0a0a0a, #3a4452);
          
        }

        header {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 15px;
            font-size: 30px;
            font-weight: bold;
            width: calc(100% - 30px);
        }

        footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
            font-size: 14px;
            width: calc(100% - 20px);
        }
        main{
            display: grid;
            place-items: center;
            padding: 30px 0px;
            
        
        }

        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(7, 1fr);
            border-radius: 25px;
            row-gap: 10px;
            padding: 22px;
            border: 6px solid #2e2f323b;
            outline: 9px red outset;
            outline-offset: 15px;
            outline-style: double;
            place-items: center;
            background: transparent;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
        }

        .display {
            grid-column: 1/5;
            grid-row: 2/3;
        }

        .expression {
            grid-column: 1/5;
            grid-row: 1/2;
        }

        .expression input {
            width: 320px;
            height: 50px;
            background: transparent;
            cursor: pointer;
            padding: 10px;
            text-align: right;
            outline: none;
            color: #ffffff;
            font-size: 24px;
            font-weight: 600;
            border: 5px solid #1c1c1cd6;
            border-radius: 10px;
            box-shadow: -5px -6px 15px #000 inset;
        }

        .display input {
            width: 320px;
            background: transparent;
            height: 84px;
            cursor: pointer;
            padding: 10px;
            text-align: right;
            outline: none;
            font-size: 30px;
            font-weight: 600;
            color: #ffffff;
            border: 5px solid #1c1c1cd6;
            border-radius: 19px;
            box-shadow: -5px -6px 15px #000 inset;
        }

        button {
            width: 60px;
            min-width: 40px;
            aspect-ratio: 1;
            border-radius: 50%;
            border: none;
            background: transparent;
            color: #ffffff;
            font-size: 24px;
            box-shadow: 4px 6px 18px black;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease-in;
        }

        button:hover {
            transform: translate3d(2px, 4px, 5px);
        }

        .btn {
            width: 60px;
            min-width: 40px;
            aspect-ratio: 1;
            border-radius: 50%;
            outline-offset: 4px;
            outline: 2px solid #242222;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(4, 60px);
                grid-template-rows: repeat(7, 60px);
            }

            .display input,
            .expression input {
                width: 240px;
                height: 60px;
                font-size: 28px;
                border-radius: 11px;
            }

            button {
                width: 40px;
                font-size: 20px;
            }

            .btn {
                width: 40px;
            }
        }
    </style>
</head>

<body>
    <header>
        Simple Calculator
    </header>

  <main>
    <div class="container">
        <div class="expression">
            <input type="text" readonly value="0" id="expression">
        </div>
        <div class="display">
            <input id="display" type="text" readonly value="0">
        </div>
        <div class="btn">
            <button class="green" onclick="clearAll()" aria-label="Clear all">AC</button>
        </div>
        <div class="btn"><button onclick="BackSpace()"><i class="fa-solid fa-delete-left green"></i></button></div>
        <div class="btn"><button class="green" onclick="plusminus()">+/-</button></div>
        <div class="btn"><button class="green" onclick="inputop('/')">÷</button></div>
        <div class="btn"><button onclick="inputnumber(7)">7</button></div>
        <div class="btn"><button onclick="inputnumber(8)">8</button></div>
        <div class="btn"><button onclick="inputnumber(9)">9</button></div>
        <div class="btn"><button class="green" onclick="inputop('*')">×</button></div>
        <div class="btn"><button onclick="inputnumber(4)">4</button></div>
        <div class="btn"><button onclick="inputnumber(5)">5</button></div>
        <div class="btn"><button onclick="inputnumber(6)">6</button></div>
        <div class="btn"><button class="green" onclick="inputop('-')">-</button></div>
        <div class="btn"><button onclick="inputnumber(1)">1</button></div>
        <div class="btn"><button onclick="inputnumber(2)">2</button></div>
        <div class="btn"><button onclick="inputnumber(3)">3</button></div>
        <div class="btn"><button onclick="inputop('+')">+</button></div>
        <div class="btn"><button onclick="inputop('%')">%</button></div>
        <div class="btn"><button onclick="inputnumber(0)">0</button></div>
        <div class="btn"><button onclick="symdot()">.</button></div>
        <div class="btn "><button class="orange" onclick="equal()">=</button></div>
    </div>
  </main>

    <footer>
        &copy; 2025 Simple Calculator - All Rights Reserved
    </footer>

    <script>
        let oldValue = 0;
        let newValue = 0;
        let operator = null;
        let exp = '';

        const display = document.getElementById('display');
        const expression = document.getElementById('expression');

        function inputnumber(x) {
            if (display.value === '0') {
                display.value = x;
            } else {
                display.value += x;
            }
            updateExpression(x);
        }

        function clearAll() {
            display.value = '0';
            oldValue = 0;
            operator = null;
            exp = '';
            expression.value = '0';
        }

        function inputop(op) {
            newValue = parseFloat(display.value);
            if (operator !== null) {
                switch (operator) {
                    case '+':
                        oldValue += newValue;
                        break;
                    case '-':
                        oldValue -= newValue;
                        break;
                    case '*':
                        oldValue *= newValue;
                        break;
                    case '/':
                        if (newValue === 0) {
                            alert("Cannot divide by zero");
                            return;
                        }
                        oldValue /= newValue;
                        break;
                    case '%':
                        oldValue = (oldValue * newValue) / 100;
                        break;
                }
            } else {
                oldValue = newValue;
            }
            if (exp === '') {
                exp += display.value + ' ' + op;
            } else {
                exp += ' ' + op;
            }
            operator = op;
            display.value = '0';
            expression.value = exp;
        }

        function equal() {
            newValue = parseFloat(display.value);
            if (operator === null) return;

            let result;
            switch (operator) {
                case '+':
                    result = oldValue + newValue;
                    break;
                case '-':
                    result = oldValue - newValue;
                    break;
                case '*':
                    result = oldValue * newValue;
                    break;
                case '/':
                    if (newValue === 0) {
                        alert("Cannot divide by zero");
                        return;
                    }
                    result = oldValue / newValue;
                    break;
                case '%':
                    result = (oldValue * newValue) / 100;
                    break;
            }
            display.value = result;
            exp += ' ' + newValue + ' = ' + result;
            expression.value = exp;
            operator = null;
            oldValue = result;
        }

        function updateExpression(value) {
            if (exp === '' || exp.endsWith(' ')) {
                exp += value;
            } else {
                exp += ' ' + value;
            }
            expression.value = exp;
        }

        function symdot() {
            if (!display.value.includes('.')) {
                display.value += '.';
            }
        }

        function plusminus() {
            if (display.value != '0') {
                display.value = display.value * -1;
            }
        }

        function BackSpace() {
            if (display.value.length > 1) {
                display.value = display.value.slice(0, -1);
            } else {
                display.value = '0';
            }
            expression.value = exp.slice(0, -1);
        }
    </script>
</body>

</html>
