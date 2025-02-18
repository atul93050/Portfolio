<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Movement Effect</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            overflow: hidden;
            position: relative;
        }

        span {
            width: 100px;
            height: 100px;
            position: absolute;
            pointer-events: none;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            animation: animate 6s linear;
        }

        @keyframes animate {
            0% {
                transform: translate(-50%, -50%);
                opacity: 1;
                filter: hue-rotate(0);
            }

            100% {
                transform: translate(-50%, -5000%);
                opacity: 0;
                filter: hue-rotate(720deg);
            }
        }
    </style>
</head>

<body>

    <script>
        const body = document.querySelector("body");

        body.addEventListener("mousemove", (event) => {
            const x = event.offsetX;
            const y = event.offsetY;
            const mouse = document.createElement("span");
            mouse.innerHTML = "🐭";
            mouse.style.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
            mouse.style.left = x + "px";
            mouse.style.top = y + "px";
            const size = Math.random() * 60;
            mouse.style.fontSize = size + "px";
            mouse.style.width = size + "px";
            mouse.style.height = size + "px";
            body.appendChild(mouse);
            setTimeout(() => {
                mouse.remove();
            }, 3000);
        });
    </script>
</body>

</html>