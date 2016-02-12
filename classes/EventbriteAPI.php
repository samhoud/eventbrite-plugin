<?php


namespace Samhoud\Eventbrite\Classes;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class EventbriteAPI {

    private $client;
    private $token;
    private $cache;
    const USE_CACHE = true;

    /**
     * EventbriteAPI constructor.
     */
    public function __construct(Token $token, Client $client)
    {
        $this->token = $token;
        $this->client = $client;
        if(self::USE_CACHE === true){
            $this->cache = new EventbriteCache;
        }
    }

    public function events($params = []){
        return $this->get('/users/me/owned_events', $params);
    }

    public function event($eventId, $params = []){
        return $this->get('/events/'.$eventId.'/', $params);
    }

    public function serieEvents($serieId, $params = []){
        return $this->get('/series/'.$serieId.'/events/', $params);
    }

    public function search($parameters = array()){
        //todo: get organizer id

        return $this->get('/events/search', $parameters);
    }


    public function get($resource, array $params = [])
    {
        $url = $this->makeUrl($resource, $params);

        $data = (self::USE_CACHE ? $this->cache->get($url) : false);
        if(!$data) {
            $response = $this->client->get($url);
            $data = json_decode($this->response($response));
            if(self::USE_CACHE){
                $this->cache->put($url, $data);
            }
        }
        return $data;
    }

    private function response(ResponseInterface $response){
        if($response->getStatusCode() !== 200){
            throw new EventbriteResponseException($response->getStatusCode(), $response->getReasonPhrase());
        }
        return $response->getBody()->getContents();
    }

    protected function makeUrl($resource, array $params = [])
    {
        $url = trim($resource, '/');
        $params = array_merge($params, ['token' => $this->token->get()]);
        $url .= '?' . http_build_query($params);
        return $url;
    }
}