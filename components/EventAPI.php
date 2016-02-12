<?php namespace Samhoud\Eventbrite\Components;

class EventAPI extends APIComponent
{

    public function componentDetails()
    {
        return [
            'name'        => 'Event API',
            'description' => 'Get details of single event'
        ];
    }

    public function onRun()
    {
        parent::onRun();

        $event = $this->api->event($this->param('eventID'));
        $this->page['eventTitle'] = $event->name->text;
        $this->page['event'] = $event;
    }

    public function test(){
        return 'bbb';
    }
}