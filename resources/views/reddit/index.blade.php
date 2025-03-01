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
        <a href="/" class="text-blue-600 hover:underline active:opacity-70">Home</a>

        <div class="flex flex-col gap-y-[20px]">
            @foreach ($posts as $post)
                <div class="flex items-center">
                    <img src="{{ $post['data']['thumbnail'] }}" alt="thumb" class="rounded-full w-20">

                    <div class="ml-2">
                        <div class="font-semibold">
                            <a href="/posts/{{ $post['data']['name'] }}" class="hover:underline active:opacity-60 text-blue-700">{{ $post['data']['title'] }}</a>
                        </div>
                        <div class="flex space-x-4">
                            <span>Ups: {{ $post['data']['ups'] }}</span>
                            <span>Comments: {{ $post['data']['num_comments'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
