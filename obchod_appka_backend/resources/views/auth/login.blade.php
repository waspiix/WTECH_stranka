<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlásenie</title>
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
        .login-container {
            background: white;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .register-link {
            margin-top: 20px;
            font-size: 14px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.location.href='{{ url('/') }}';">Späť</button>
    <div class="login-container">
        <h2>Prihlásenie</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <input id="password" type="password" name="password" placeholder="Heslo" required>
            @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror


            <button type="submit">Prihlásiť sa</button>
        </form>

        <div class="register-link">
            <p>Nemáš účet? <a href="{{ route('register') }}">Registrovať sa</a></p>
        </div>
    </div>
</body>
</html>
