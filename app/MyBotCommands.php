<?php

namespace App;
use App\Http\Controllers\BotManController;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;


class MyBotCommands {

    public function handleFoo($bot, $ville) {
		$lang = 'fr';
		// Units (can be 'metric' or 'imperial' [default]):
		$units = 'metric';
        $owm = new OpenWeatherMap();
		$owm->setApiKey('1a068f0bc04c1091da44bc9e38e7ac1f');
		try{
			$weather = $owm->getWeather($ville, $units, $lang);
		}
		catch(OWMException $e){
			$bot->reply('Je ne connais pas cette ville');
		}
		$temp = $weather->temperature->getValue();
		$clouds = $weather->clouds->getDescription();
		if ($clouds == NULL) {
			$bot->reply('Je ne connais pas cette ville');
		}
		else {
			$temp = $temp . '°C';
			if ($weather->temperature->getValue() < 0) {
				$temp = $temp . ', risque de verglas, ';
			}
			if ($clouds == 'nuageux') {
				$clouds = $clouds . ' attention !';
			}
			if ($clouds == 'ciel dégagé') {
				$clouds = 'dégagé';
			}
			if ($clouds == 'dégagé' AND $weather->temperature->getValue() > 0) {
				$clouds = $clouds . ' Vous pouvez rouler en toute tranquilité !';
			}
       		$bot->reply('Meteo de ' . $ville . " : " .$temp . " et le ciel est " . $clouds);
		}
    }

}