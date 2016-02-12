<?php


namespace Samhoud\Eventbrite\Classes;


class EventbriteResponseException extends \Exception{
    public $statusCode;
    public $reason;

    /**
     * EventbriteResponseException constructor.
     * @param $reason
     * @param $statusCode
     */
    public function __construct($reason, $statusCode)
    {
        $this->reason = $reason;
        $this->statusCode = $statusCode;

        parent::__construct('Error: statuscode: ' . $statusCode . ' reason: '. $reason);
    }



}