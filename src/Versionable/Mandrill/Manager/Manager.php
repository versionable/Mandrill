<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Client;
use Versionable\Mandrill\Util\Inflector;

use Versionable\Common\Collection\Set;

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
    
    protected function doSend($action, Set $payload = null)
    {
        if (null === $payload) {
            $payload = array();
        } else {
            $payload = $this->buildPayload($payload);
        }
        
        return json_decode($this->client->send(static::API_BASE.$action, $payload));
    }
    
    protected function buildPayload(Set $set)
    {
        $payload = array();
        
        foreach ($set->getIterator() as $field => $data) {
            if ($data instanceof Set) {
                $data = $this->buidPayload($data);
            } elseif (true === is_object($data)) {
                $data = $this->convertObject($data);
            }
            
            $payload[Inflector::underscore($field)] = $data;
        }
        
        return $payload;
    }
    
    protected function convertObject($object)
    {
        $reflClass = new \ReflectionClass(get_class($object));
        
        $data = array();
        foreach ($reflClass->getProperties(\ReflectionProperty::IS_PROTECTED) as $property) {
            $property->setAccessible(true);
            
            $value = $property->getValue($object);
            
            if ($value instanceof Set) {
                $value = $this->buildPayload($value);
            }
            $data[Inflector::underscore($property->getName())] = $value;
        }
        
        return $data;
    }
}
