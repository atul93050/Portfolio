let clock = document.getElementById('clock');
        let sec = document.getElementById('sec');
        let min = document.getElementById('min');
        let hour = document.getElementById('hour');


        function ev() {
            let time = new Date();
            let s = (time.getSeconds()) * 6;
            let m = (time.getMinutes()) * 6;
            let h = (time.getHours()) * 30;

            sec.style.transform = `rotate(${s}deg)`;
            sec.style.transformOrigin = "bottom";
            min.style.transform = `rotate(${m}deg)`;
            min.style.transformOrigin = "bottom";
            hour.style.transform = `rotate(${h}deg)`;
            hour.style.transformOrigin = "bottom";




        }
        clock.addEventListener('load', ev());
        setInterval(ev, 1);