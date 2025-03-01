<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NativePHP</title>
    @vite(['resources/js/app.js'])

    <style>
        body.dark {
            background: #222;
            color: #fff;
        }

        body.dark a {
            color: lightblue;
        }
    </style>
</head>
<body class="{{ $theme }}">
    <a href="{{ route('welcome') }}">
        Home page
    </a>

    <form action="{{ route('preferences') }}" method="POST">
        @csrf

        <fieldset>
            <legend>Select your theme</legend>

            <div>
                <input type="radio" id="light" name="theme" value="light" @checked($theme === 'light')>
                <label for="light">Light</label>
            </div>

            <div>
                <input type="radio" id="dark" name="theme" value="dark" @checked($theme === 'dark')>
                <label for="dark">Dark</label>
            </div>

            <button>Save</button>
        </fieldset>
    </form>
</body>
</html>
