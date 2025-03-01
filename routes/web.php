<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Native\Laravel\Facades\Notification;
use Native\Laravel\Facades\Settings;
use Native\Laravel\Facades\Window;

Route::get('/', function () {
    if (request()->openwindow) {
        Window::open('about')
            ->route('about')
            ->width(800)
            ->height(800)
            ->showDevTools(false);
    }

    if (request()->notification) {
        Notification::title('Hello from NativePHP')
            ->message('This is a detail message coming from your Laravel app.')
            ->show();
    }

    return view('welcome', [
        'users' => User::orderBy('id', 'DESC')->get(),
        'theme' => Settings::get('theme', 'light'),
    ]);
})->name('welcome');

Route::post('/users', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt('123123123'),
    ]);

    Notification::title('User created!')
        ->message("User {$user->name} was successfully created!")
        ->show();

    return redirect()->route('welcome')->with('success', 'User was successfully created');
})->name('users.store');

Route::get('/about', function () {
    return view('about', [
        'theme' => Settings::get('theme', 'light'),
    ]);
})->name('about');

Route::get('/settings', function () {
    return view('settings', [
        'theme' => Settings::get('theme', 'light'),
    ]);
})->name('settings');

Route::post('/settings', function (Request $request) {
    Settings::set('theme', $request->theme);

    return redirect()->route('welcome');
})->name('preferences');

Route::get('/reddit', function () {
    $response = Http::get('https://www.reddit.com/r/rarepuppers.json');
    $posts = $response->json()['data']['children'];

    return view('reddit.index', [
        'posts' => $posts,
    ]);
})->name('reddit.index');

Route::get('/posts/{id}', function (string $id) {
    $response = Http::get('https://api.reddit.com/api/info/?id='.$id);
    $post = $response->json()['data']['children'];

    Notification::title($post[0]['data']['title'])
        ->message('Cute doggos')
        ->show();

    return view('reddit.show', [
        'post' => $post,
    ]);
})->name('reddit.show');
