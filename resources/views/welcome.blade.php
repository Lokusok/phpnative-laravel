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
    <a href="/about">
        About
    </a>

    <a href="/?openwindow=true">
        Open window
    </a>

    <a href="/?notification=true">
        Notification
    </a>

    <hr>
        <div>
            Theme: {{ $theme }}
        </div>

        <a href="{{ route('settings') }}">
            Settings
        </a>

        <a href="{{ route('reddit.index') }}">
            Reddit
        </a>
    <hr>

    <div>
        Hello There
    </div>

    <h1>Users list</h1>

    @session('success')
        <hr>
            <div>{{ $value }}</div>
        <hr>
    @endsession

    <div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div>
                <input type="text" name="name" placeholder="Username">
            </div>

            <div>
                <input type="text" name="email" placeholder="Email">
            </div>

            <div>
                <button type="submit">
                    Create user
                </button>
            </div>
        </form>
    </div>

    <hr>

    <div>
        @forelse ($users as $user)
            <div>{{ $user->name }}</div>
        @empty
            <div>No users found</div>
        @endforelse
    </div>
</body>
</html>
