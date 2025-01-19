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
    operator = null;
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

{/* <script>
// Capture and send calculation to PHP for storage
function submitCalculation() {
    const expression = document.getElementById('expression').value;
    const result = document.getElementById('display').value;

    const form = document.createElement('form');
    form.method = 'post';
    form.style.display = 'none';

    const expressionInput = document.createElement('input');
    expressionInput.name = 'expression';
    expressionInput.value = expression;

    const resultInput = document.createElement('input');
    resultInput.name = 'result';
    resultInput.value = result;

    form.appendChild(expressionInput);
    form.appendChild(resultInput);
    document.body.appendChild(form);
    form.submit();
}
</script> */}