const hour = document.getElementById('hour');
const sec = document.getElementById('sec');
const min = document.getElementById('min');
const clockBox = document.getElementById('clock');
const ml = document.getElementById('ml');


function clock() {

    let date = new Date();
    let h = date.getHours();
    let s = date.getSeconds();
    let m = date.getMinutes();
    let mll = date.getMilliseconds();

    if (h < 10) {

        hour.innerHTML = '0' + h;

    }
    else {
        hour.innerHTML = h;
    }
    if (s < 10) {


        sec.innerHTML = '0' + s;
    }
    else {
        sec.innerHTML = s;
    }
    if (m < 10) {


        min.innerHTML = '0' + m;
    }
    else {
        min.innerHTML = m;
    }

    ml.innerHTML = mll;


};
clockBox.addEventListener('load', clock());
setInterval(clock, 1);