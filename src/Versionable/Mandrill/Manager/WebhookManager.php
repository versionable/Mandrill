<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Webhook\Webhook;

/**
 * Description of UserManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class WebhookManager extends Manager
{
    const API_BASE = '/webhooks/';
    
    public function add(Webhook $webhook)
    {
        $response = $this->send('add', array(
            'url' => $webhook->getUrl(),
            'events' => $webhook->getEvents()
        ));
        
        return $this->createWebhook($response);
    }
    
    private function createWebhook(\StdClass $data)
    {
        $webhook = new Webhook();
        
        $webhook->setCreatedAt(new \DateTime($data->created_at));
        $webhook->setBatchesSent($data->batches_sent);
        $webhook->setEvents($data->events);
        $webhook->setEventsSent($data->events_sent);
        $webhook->setId($data->id);
        $webhook->setLastError($data->last_error);
        $webhook->setUrl($data->url);
        
        if (null !== $data->last_sent_at) {
            $webhook->setLastSentAt(new \DateTime($data->last_sent_at));
        }
        
        return $webhook;
    }
}
