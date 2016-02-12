<?php


namespace App\Eventbrite;


use GuzzleHttp\Client;
use October\Rain\Support\ServiceProvider;
use Samhoud\Eventbrite\Classes\EventbriteAPI;
use Samhoud\Eventbrite\Classes\Token;
use Samhoud\Eventbrite\Models\Settings;

class EventbriteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(EventbriteAPI::class, function ($app) {

            $token = new Token(Settings::get('api_key'));

            $client = new Client(['base_uri' => Settings::get('api_url')]);

            return new EventbriteAPI($token, $client);
        });
    }
}