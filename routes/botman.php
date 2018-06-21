<?php
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Auth;

$botman = resolve('botman');


$botman->hears('.* conseil.*accident.*', function ($bot) {
    $bot->reply('Des choses très simples peuvent vous eviter d\'avoir un accident, comme ne pas boire avant de prendre la route, entretenir son véhicule, respectez les distances de sécurité ou encore, renseignez vous sur les conditions de circulations.');
});

$botman->hears('.*faire.*accident.*', function ($bot) {
    $bot->reply('Si vous avez un accident, gardez votre calme. Appelez les secours ou la police si besoin, pensez à mettre vos warnings et installer le triangle de signalisation.');
});

$botman->hears('.*numéro.*', function ($bot) {
    $bot->reply('En cas de problème, vous pouvez joindre le samu(15), la Police(17), les pompiers(18), ou le numéro d\'appel d\'urgence européen(112)');
});


$botman->hears('.*meteo de {ville}', 'App\MyBotCommands@handlefoo');

$botman->fallback(function($bot) {
    $bot->reply('Désole je n\'ai pas compris ce que vous me disiez');
});


$botman->hears('Bonjour ?.*?', BotManController::class.'@startConversation');
