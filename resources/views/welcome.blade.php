<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a mi web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        h1 {
            font-size: 3em;
        }

        p {
            font-size: 1.2em;
            margin: 20px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background: #6a11cb;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #2575fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ongietorri</h1>
        <p>Prueba</p>
        <a href="/loginView" class="btn">Loginera jun</a>
    </div>
</body>
</html>