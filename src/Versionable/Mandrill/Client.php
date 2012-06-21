<?php

namespace Versionable\Mandrill;

use Versionable\Prospect\Request\Request;
use Versionable\Prospect\Response\Response;
use Versionable\Prospect\Url\Url;
use Versionable\Prospect\Adapter\Curl;
use Versionable\Prospect\Client\Client as HTTPClient;
use Versionable\Prospect\Parameter\Parameter;
use Versionable\Prospect\Header\ContentType;

/**
 * Description of Client
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Client
{
    const API_URL = 'https://mandrillapp.com/api/1.0:action.json';
    
    protected $client;
    
    private $apiKey;
    
    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
        
        $this->client = new HTTPClient(new Curl());
    }
    
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    
    public function send($uri, array $payload = array())
    {
        // add key to payload
        $payload['key'] = $this->apiKey;
        
        $request = new Request(new URL(strtr(static::API_URL, array(
            ':action' => $uri
        ))));
        
        $request->setMethod('POST');
        
        $request->getHeaders()->add(new ContentType('application/json charset=utf-8'));
        $request->setBody(json_encode($payload));
        
        $response = $this->client->send($request, new Response());
        
        if ($response->getCode() != 200) {
            $data = json_decode($response->getContent());
            
            throw new \RuntimeException($data->message);
        }
        
        return $response->getContent();
    }
}
