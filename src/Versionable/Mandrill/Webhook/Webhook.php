<?php

namespace Versionable\Mandrill\Webhook;

/**
 * Description of Webhook
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Webhook
{
    protected $id;
    
    protected $url;
    
    protected $events;
    
    protected $createdAt;
    
    protected $lastSentAt;
    
    protected $batchesSent;
    
    protected $eventsSent;
    
    protected $lastError;
    
    private $validEvents = array(
        'send',
        'hard_bounce',
        'soft_bounce',
        'open',
        'click',
        'spam',
        'unsub',
        'reject',
    );
    
    public function __construct()
    {
        $this->events = array();
        $this->batchesSent = 0;
        $this->eventsSent = 0;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setEvents(array $events)
    {
        foreach ($events as $event) {
            $this->addEvent($event);
        }
    }
    
    public function addEvent($event)
    {
        if (false === in_array($event, $this->validEvents)) {
            throw new \InvalidArgumentException(sprintf('Event must be one of %s, "%s" given.', implode(', ', $this->validEvents, $event)));
        }
        
        $this->events[] = $event;
    }
        
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getLastSentAt()
    {
        return $this->lastSentAt;
    }

    public function setLastSentAt(\DateTime $lastSentAt)
    {
        $this->lastSentAt = $lastSentAt;
    }

    public function getBatchesSent()
    {
        return $this->batchesSent;
    }

    public function setBatchesSent($batchesSent)
    {
        $this->batchesSent = $batchesSent;
    }

    public function getEventsSent()
    {
        return $this->eventsSent;
    }

    public function setEventsSent($eventsSent)
    {
        $this->eventsSent = $eventsSent;
    }

    public function getLastError()
    {
        return $this->lastError;
    }

    public function setLastError($lastError)
    {
        $this->lastError = $lastError;
    }
}
