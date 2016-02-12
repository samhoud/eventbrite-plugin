<?php namespace Samhoud\Eventbrite\Components;


class EventSeriesAPI extends APIComponent
{
    public function componentDetails()
    {
        return [
            'name'        => 'Event series API',
            'description' => 'Get all event series'
        ];
    }

    public function defineProperties()
    {
        return [
            'show_series_parent' => [
                'description'       => 'Get only parent or all events of a serie',
                'title'             => 'Show serie parent',
                'default'           => true,
                'type'              => 'bool',
            ],
        ];

    }

    public function onRun()
    {
        parent::onRun();
        $events = $this->api->events(['show_series_parent' => $this->property('show_series_parent')]);

        $this->page['series'] = $events->events;
    }
}