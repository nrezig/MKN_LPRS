<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur MKN_LPRS</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0.5em; /* Ajustez la valeur selon vos besoins */
        }

        main {
            flex: 1;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #ffffff;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 0.5em;
            background-color: #333;
            color: #fff;
        }

        .presentation-section {
            text-align: center;
            margin-top: 20px;
        }

        .custom-btn {
            color: white;
            border: 1px solid white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .custom-btn:hover {
            background-color: white;
            color: #333;
        }
    </style>
</head>
<body>

<header>
    <h1>Bienvenue sur MKN_LPRS</h1>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 justify-end">
            @auth
                <a href="{{ url('/home') }}" class="ml-4 custom-btn">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="ml-4 custom-btn">Connexion</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 custom-btn">Créer un compte</a>
                @endif
            @endauth
        </div>
    @endif
    <br>
</header>

<main>
    <section class="presentation-section">
        <h2 style="text-decoration: underline;">BTS SIO SLAM 2</h2>
        <p>MKN_LPRS est un site fait par Benazza Mohamed, Rezig Noussaira et Sedjai Khatir.</p>
        <p>Bienvenue sur notre plateforme!</p>
    </section>
</main>

<footer>
    <p>&copy; 2023 MKN_LPRS. Tous droits réservés.</p>
</footer>

</body>
</html>
