<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        form {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .form-group label {
            flex: 1 0 100%;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            flex: 1 0 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #00ff40;
        }

        .form-group.radio-group {
            display: flex;
            justify-content: space-between;
        }

        .form-group.radio-group label {
            flex: 1;

            margin: auto;
        }

        .form-group.radio-group input {
            margin-right: 5px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-actions button {
            padding: 10px 20px;
            background-color:#00ff40d5;
            color: #fff;
            border: none;
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-actions button:hover {
            background-color: #0056b3;
        }

        .form-actions button[type="reset"] {
            background-color: #6c757d;
        }

        .form-actions button[type="reset"]:hover {
            background-color: #5a6268;
        }

        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }

            .form-group.radio-group {
                flex-direction: column;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions button {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <form action="/submit_form.php" method="get">
        <h1>Student Registration Form</h1>
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required>
        </div>
        <div class="form-group radio-group">
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <label><input type="radio" name="gender" value="Female" required> Female</label>
            <label><input type="radio" name="gender" value="Other" required> Other</label>
        </div>
        <div class="form-group">
            <label for="fathername">Father Name:</label>
            <input type="text" name="Fathername" id="fathername">
        </div>
        <div class="form-group">
            <label for="mothername">Mother Name:</label>
            <input type="text" name="mothername" id="mothername">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label>Permanent Address:</label>
            <textarea name="permanent_address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Current Address:</label>
            <textarea name="current_address" rows="3"></textarea>
        </div>
        <div class="form-actions">
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>

</html>
