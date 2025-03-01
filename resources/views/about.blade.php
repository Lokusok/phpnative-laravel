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
    <a href="/">
        Home
    </a>

    <div>
        About page
    </div>

    <button onclick="showAlert()">
        Alertify
    </button>

    <script>
        function showAlert() {
            alert('Hello');
        }
    </script>
</body>
</html>
