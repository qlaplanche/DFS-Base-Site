<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('How are you', function ($bot) {
    $bot->reply('I am fine and you?');
});

$botman->hears('Hi', function ($bot) {
    $bot->reply('Helloooo!');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
