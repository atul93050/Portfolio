<?php
session_start();

// Clear history if the button is pressed
if (isset($_POST['clear_history'])) {
    unset($_SESSION['history']);
}

// Initialize history if it doesn't exist
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}



function addToHistory($expression)
{

    $_SESSION['history'][] = ['expression' => $expression];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $expression = $_POST['expression'] ?? '';

    addToHistory($expression);
    exit; 


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Calculator</title>
    <link rel="stylesheet" href="calculator.css">
</head>

<body>
    <div class="container">
        <!-- Expression Display -->
        <div class="expression">
            <input type="text" readonly value="0" id="expression">
        </div>
        <!-- Main Display -->
        <div class="display">
            <input id="display" type="text" readonly value="0">
        </div>
        <!-- Buttons -->
        <div class="btn"><button class="green" onclick="clearAll()" aria-label="Clear all">AC</button></div>
        <div class="btn"><button onclick="BackSpace()" aria-label="Delete last entry"><i class="fa-solid fa-delete-left"></i></button></div>
        <div class="btn"><button class="green" onclick="plusminus()">+/-</button></div>
        <div class="btn"><button class="green" onclick="inputop('/')">÷</button></div>
        <div class="btn"><button onclick="sinFunction()">sin</button></div>
        <div class="btn"><button onclick="cosFunction()">cos</button></div>
        <div class="btn"><button onclick="tanFunction()">tan</button></div>
        <div class="btn"><button onclick="squareRoot()">√</button></div>
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
        <div class="btn"><button class="green" onclick="inputop('+')">+</button></div>
        <div class="btn"><button onclick="inputop('%')">%</button></div>
        <div class="btn"><button onclick="inputnumber(0)">0</button></div>
        <div class="btn"><button onclick="symdot()">.</button></div>
        <div class="btn"><button class="orange" onclick="equal()">=</button></div>
    </div>

    <!-- Calculation History -->
    <div class="history">
        <h2>Calculation History</h2>
      
        <?php if (!empty($_SESSION['history'])): ?>
            <ul>
                <?php foreach ($_SESSION['history'] as $item): ?>
                    <li><?= htmlspecialchars($item['expression']) ?></li>
                <?php endforeach; ?>
            </ul>
            <!-- Clear History Button -->
            <form method="post">
                <input type="submit" class="clear_history" name="clear_history" value="Clear History" />
            </form>
        <?php else: ?>
            <p>No history yet.</p>
        <?php endif; ?>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.4.4/math.min.js"></script>
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
            updateExpression();
        }

        function clearAll() {
            display.value = '0';
            oldValue = 0;
            newValue = 0;
            operator = null;
            exp = '';
            expression.value = '0';
        }

        function inputop(op) {
            newValue = parseFloat(display.value);
            if (operator !== null) {
                calculateIntermediate();
            } else {
                oldValue = newValue;
            }
            operator = op;
            exp += ` ${newValue} ${op}`;
            display.value = '0';
            expression.value = exp;
        }

        function sinFunction() {
            newValue = parseFloat(display.value);
            display.value = Math.sin(newValue * (Math.PI / 180)); // Convert to radians
            exp += ` sin(${newValue}) = ${display.value}`;
            expression.value = exp;
        }

        function cosFunction() {
            newValue = parseFloat(display.value);
            display.value = Math.cos(newValue * (Math.PI / 180)); // Convert to radians
            exp += ` cos(${newValue}) = ${display.value}`;
            expression.value = exp;
        }

        function tanFunction() {
            newValue = parseFloat(display.value);
            display.value = Math.tan(newValue * (Math.PI / 180)); // Convert to radians
            exp += ` tan(${newValue}) = ${display.value}`;
            expression.value = exp;
        }

        function squareRoot() {
            newValue = parseFloat(display.value);
            if (newValue < 0) {
                alert("Cannot calculate the square root of a negative number.");
                return;
            }
            display.value = Math.sqrt(newValue);
            exp += ` √${newValue} = ${display.value}`;
            expression.value = exp;
        }

        function calculateIntermediate() {
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
        }

        function equal() {
            newValue = parseFloat(display.value);
            if (operator === null) return;

            calculateIntermediate();

            display.value = oldValue;
            exp += ` ${newValue} = ${oldValue}`;
            expression.value = exp;
            
            if(expression.value !== ""){
                addToHistory(expression.value);
            }

            operator = null;
        }

        function addToHistory(expression) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "calculator.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("History updated successfully");
                } else if (xhr.readyState === 4) {
                    console.error("Failed to update history:", xhr.responseText);
                }
            };
            xhr.send("expression=" + encodeURIComponent(expression));
        }


        function updateExpression() {
            if (!exp.includes('=')) {
                exp = exp.split('=').shift() || '';
            }
            expression.value = `${exp} ${display.value}`;
        }

        function symdot() {
            if (!display.value.includes('.')) {
                display.value += '.';
            }
        }

        function plusminus() {
            if (display.value !== '0') {
                display.value = String(parseFloat(display.value) * -1);
            }
        }

        function BackSpace() {
            display.value = display.value.slice(0, -1) || '0';
        }
    </script>

</body>

</html>