<?php
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Auth;

$botman = resolve('botman');

$botman->hears('Comment vas tu \?', function ($bot) {
    $bot->reply('I am fine.');
});

$botman->hears('hi', function ($bot) {
	$user = Auth::user()->firstname();
    $bot->reply('Bonjour ' . $user . " !!");
});

$botman->hears('.*meteo de {ville}', 'App\MyBotCommands@handlefoo');

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands');
});