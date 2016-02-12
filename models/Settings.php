<?php namespace Samhoud\Eventbrite\Models;

use October\Rain\Database\Model;

/**
 * Google Analytics settings model
 *
 * @package system
 * @author Alexey Bobkov, Samuel Georges
 *
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'samhoud_eventbrite_settings';

    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'gapi_key' => ['System\Models\File', 'public' => false]
    ];

    /**
     * Validation rules
     */
    public $rules = [
        'api_key'   => 'required',
        'api_url'   => 'required'
    ];

    public function initSettingsData()
    {
        $this->api_url = 'https://www.eventbriteapi.com/v3/';
    }
}