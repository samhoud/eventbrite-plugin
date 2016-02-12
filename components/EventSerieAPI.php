<?php namespace Samhoud\Eventbrite\Components;

class EventSerieAPI extends APIComponent
{
    public function componentDetails()
    {
        return [
            'name'        => 'Event serie API',
            'description' => 'Get all events  of a serie'
        ];
    }

    public function onRun()
    {
        parent::onRun();

        $serieEvents = $this->api->serieEvents($this->param('serieID'));

        $this->page['eventTitle'] = $serieEvents->events[0]->name->text;
        $this->page['serieEvents'] = $serieEvents->events;
    }
}