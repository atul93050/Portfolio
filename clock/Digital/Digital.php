<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Clock</title>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Digital.css">
    
</head>

<body>
    <div class="container" id="clock">

      <div class="content">
        <span class="hour" id="hour">08</span>
        <span class="colon">:</span>
        <span class="min" id="min">37</span>
        <span class="colon">:</span>
        <span class="sec" id="sec">37</span>


        <div class="day">
            <span class="pm">PM</span>
            <span class="ml" id="ml">000</span>
        </div>
      </div>
        
        <audio id="tick-sound" src="tick.mp3"></audio>

        <div class="date" id="date"></div>

    </div>
    <script src="Digital.js"></script>

</body>

</html>