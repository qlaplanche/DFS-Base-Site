<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
	Validator::extend('is_situation_enum', function($attribute, $value, $parameters, $validator)
	{
	    return in_array($value, ['ok', 'warning', 'critical', 'meteo']);
	});

	Validator::extend('valid_position', function($attribute, $value, $parameters, $validator)
	{
	    if($attribute == 'position')
	    {
		$latitude = $validator->getData()['latitude'];
		$longitude = $validator->getData()['longitude'];

		if($latitude == null && $longitude == null)
		{
		    return true;
		}
		else if($latitude != null && $longitude != null)
		{
		    return true;
		}
		else
		{
		    return false;
		}
	    }
	});

	Validator::extend('valid_latitude', function($attribute, $value, $parameters, $validator)
	{
	    $latitude = $validator->getData()['latitude'];

	    if($latitude <=90 && $latitude >= -90)
	    {
		return true;
	    }
	    else
	    {
		return false;
	    }
	});

	Validator::extend('valid_longitude', function($attribute, $value, $parameters, $validator)
	{
	    $longitude = $validator->getData()['longitude'];

	    if($longitude <=180 && $longitude >= -180)
	    {
		return true;
	    }
	    else
	    {
		return false;
	    }
	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
