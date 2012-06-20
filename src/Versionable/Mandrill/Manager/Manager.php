<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Client;

/**
 * Description of Manager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
abstract class Manager
{
    protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function getClient()
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }
    
    public function send($action, array $payload = array())
    {
        return json_decode($this->client->send(static::API_BASE.$action, $payload));
    }
}
