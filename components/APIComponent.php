<?php namespace Samhoud\Eventbrite\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\App;
use Samhoud\Eventbrite\Classes\ConvertEventDate;
use Samhoud\Eventbrite\Classes\EventbriteAPI;

abstract class APIComponent extends ComponentBase
{
    /**
     * @var \Samhoud\Eventbrite\Classes\EventbriteAPI
     */
    protected $api;
    /**
     * @var \Samhoud\Eventbrite\Classes\ConvertEventDate
     */
    protected $dateConverter;

    /**
     * APIComponent constructor.
     * @param $api
     */
    public function onRun()
    {
        $this->dateConverter = App::make(ConvertEventDate::class);
        $this->api = App::make(EventbriteAPI::class);
    }


    public function convertDate($eventDateTimeObject){
        return $this->dateConverter->convertToDate($eventDateTimeObject);
    }

    public function convertToTime($eventDateTimeObject){
        return $this->dateConverter->convertToTime($eventDateTimeObject);
    }

}