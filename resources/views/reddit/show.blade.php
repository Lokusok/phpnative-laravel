<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="my-[15px] mx-[30px]">
        <a href="{{ route('reddit.index') }}" class="text-blue-600 hover:underline active:opacity-70">List</a>

        <div class="flex flex-col gap-y-[20px]">
            <h2 class="text-lg font-semibold mt-4">
                {{ $post[0]['data']['title'] }}
            </h2>

            <img src="{{ $post[0]['data']['url'] }}" alt="image">
        </div>
    </div>
</body>
</html>
