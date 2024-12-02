<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="app\Views\login_register.css">-->
    <title>Social Gite - Home</title>
    <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
        }
        header {
            background-color: #48c9b0;
            padding: 20px;
            text-align: center;
            color: white;
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
            background-image: url('scampagnate.jpg');
            background-size: cover;
            background-position: center;
        }
        .button-container {
            text-align: center;
        }
        button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #48c9b0;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #1abc9c;
        }
    </style>
</head>
<body>
    <header>
        <h1>Benvenuto su TripMate!</h1>
        <p>Connettiti con amici per fantastiche gite e scampagnate.</p>
    </header>
    <main>
        <div class="button-container">
            <button onclick="window.location.href='login.php'">Login</button>
            <button onclick="window.location.href='register.php'">Registrati</button>
        </div>
    </main>
</body>
</html>
