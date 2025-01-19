

        let oldValue = 0;
        let newValue = 0;
        let operator = null;
        let exp='';
     
        const display = document.getElementById('display');
        const expression =document.getElementById('expression');

        function inputnumber(x) {
            if (display.value == '0') {
                display.value = x;
            } else {
                display.value += x;
            }
        }

        function clearAll() {
            display.value = 0;
            oldValue = 0;
            operator = null;
            exp = '';
        }

        function inputop(op) {
            oldValue = parseFloat(display.value);
            operator = op;
            display.value = 0;
        }

        function equal() {
            newValue = parseFloat(display.value);
            switch (operator) {
                case '+':
                    display.value = oldValue + newValue;
                    break;
                case '-':
                    display.value = oldValue - newValue;
                    break;
                case 'x':
                    display.value = oldValue * newValue;
                    break;
                case '/':
                    display.value = oldValue / newValue;
                    break;
                case '%':
                    display.value = oldValue % newValue;
                    break;
                default:
                    display.value = oldValue;
                    break;
            }
        }

        function symdot() {
            if (!display.value.includes('.')) {
                display.value += '.';
            }
        }

        function plusminus() {
            display.value = display.value * -1;
        }
