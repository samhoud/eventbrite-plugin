<?php

namespace Samhoud\Eventbrite\Classes;


use Carbon\Carbon;
use DateTimeZone;

class ConvertEventDate
{

    public function convertToCarbon($dateTimeObject){
        $dt = new \DateTime($dateTimeObject->local, new DateTimeZone($dateTimeObject->timezone));
        return Carbon::instance($dt);
    }

    public function convertToFormat($dateTimeObject, $format){
        $dt = $this->convertToCarbon($dateTimeObject);
        return $dt->format($format);
    }

    public function convertToDate($event, $format = 'd-m'){
        return $this->convertToFormat($event->start, $format);
    }

    public function convert($event){
        return [
            'start' => $this->convertToCarbon($event->start),
            'end' => $this->convertToCarbon($event->end)
        ];
    }

    public function convertToTime($eventDateTimeObject){
        return $this->convertToFormat($eventDateTimeObject, $format = "H:i");
    }

    public function convertToTimeRange($event){
        return [
            'start' => $this->convertToTime($event->start),
            'end' => $this->convertToTime($event->end),
        ];
    }
}