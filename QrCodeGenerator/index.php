<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Generate QR Code</h1>

        <div class="input-group">
            <input type="text" placeholder="Enter URL or text..." id="qr-input">
            <div class="error-msg">Please enter valid content!</div>
        </div>

        <button id="generate-btn">Generate QR Code</button>

        <div class="qr-code" id="qr-code">
            <!-- QR Code will be inserted here -->
            <img src="" alt="" srcset="">

        </div>

        <a class="download-btn" id="download-btn">Download QR Code</a>
    </div>

    <script  src="script.js" >
    </script>
</body>

</html>