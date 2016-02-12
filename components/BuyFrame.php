<?php namespace Samhoud\Eventbrite\Components;

use Cms\Classes\ComponentBase;

class BuyFrame extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'BuyFrame Component',
            'description' => 'The Eventbrite iframe form'
        ];
    }

    public function defineProperties()
    {
        return [
            'event_id' => [
                'description'       => 'ID of event to show in BuyFrame',
                'title'             => 'Event ID',
                'default'           => '',
                'type'              => 'string',
            ]
        ];

    }

    public function onRun()
    {
        $this->page['event_id'] =  $this->eventId();
    }

    public function eventId(){
        if($this->param('eventID')){
            return $this->param('eventID');
        }
        if($this->param('seriesID')){
            return $this->param('serieID');
        }
        return $this->property('event_id');
    }
}