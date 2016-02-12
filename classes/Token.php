<?php


namespace Samhoud\Eventbrite\Classes;


class Token
{
    private $token;

    /**
     * Token constructor.
     * @param $token
     */
    public function __construct($token)
    {
        if(!$token){
            throw new EventbriteTokenException("Invalid token supplied");
        }
        $this->token = $token;
    }

    public function get(){
        return $this->token;
    }

    public function __toString()
    {
        return $this->token;
    }

}