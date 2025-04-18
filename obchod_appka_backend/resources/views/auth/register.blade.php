<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrácia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #6c757d;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        .register-container {
            background: white;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        .register-container h2 {
            margin-bottom: 20px;
        }
        .register-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .register-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <a href="{{ route('login') }}" class="back-button">Späť</a>
    <div class="register-container">
        <h2>Registrácia</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="meno" placeholder="Meno" value="{{ old('meno') }}" required>
            <input type="text" name="priezvisko" placeholder="Priezvisko" value="{{ old('priezvisko') }}" required>
            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <input type="password" name="password_confirmation" placeholder="Potvrďte heslo" required>

            <button type="submit">Registrovať</button>
        </form>

        <p>Máte už účet? <a href="{{ route('login') }}">Prihláste sa</a></p>
    </div>
</body>
</html>
