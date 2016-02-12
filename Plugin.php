<?php namespace Samhoud\Eventbrite;

use Backend;
use GuzzleHttp\Client;
use Samhoud\Eventbrite\Classes\EventbriteAPI;
use Samhoud\Eventbrite\Classes\Token;
use Samhoud\Eventbrite\Models\Settings;
use System\Classes\PluginBase;

/**
 * Eventbrite Plugin Information File
 */
class Plugin extends PluginBase
{

    public function register()
    {
        $this->app->singleton(EventbriteAPI::class, function ($app) {
            // todo: call service provider?
            $token = new Token(Settings::get('api_key'));
            $client = new Client(['base_uri' => Settings::get('api_url')]);
            return new EventbriteAPI($token, $client);
        });
    }

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Eventbrite API',
            'description' => 'Connect to Evenbrite API',
            'author'      => 'Samhoud',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Samhoud\Eventbrite\Components\EventSeriesAPI' => 'EventSeriesAPI',
            'Samhoud\Eventbrite\Components\EventSerieAPI' => 'EventSerieAPI',
            'Samhoud\Eventbrite\Components\EventAPI' => 'EventAPI',
            'Samhoud\Eventbrite\Components\BuyFrame' => 'BuyFrame',
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => '&samhoud Eventbrite API',
                'icon'        => 'icon-bar-chart-o',
                'description' => 'API Settings',
                'class'       => 'Samhoud\Eventbrite\Models\Settings',
                'permissions' => ['samhoud.eventbrite.settings'],
                'order'       => 600
            ]
        ];
    }

}
