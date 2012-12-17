<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Common\Collection\Set;
use Versionable\Mandrill\Message\Message;
use Versionable\Mandrill\Message\Receipient;

/**
 * Description of MessageManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class MessageManager extends Manager
{
    const API_BASE = '/messages/';
    
    public function send(Message $message)
    {
        $response = $this->doSend('send', new Set(array(
            'message' => $message
        )));
        
        $recipients = new Set();
        foreach ($response as $to) {
            $recipient = new Receipient();
            $recipient->setEmail($to->email);
            $recipient->setStatus($to->status);
            $recipients->add($recipient);
        }
        
        return $recipients;
    }
    
    public function sendTemplate()
    {
        
    }
    
    public function search($query = null, \DateTime $dateFrom = null, \DateTime $dateTo = null, $tags = array(), $senders = array(), $limit = 10)
    {
        $params = array();
        
        if (null !== $query) {
            $params['query'] = $query;
        }
        
        if (null !== $dateFrom) {
            echo $dateFrom->format('Y-m-d h:i:s');
            exit;
            $params['date_from'] = $dateFrom->format('Y-m-d h:i:s');
            //2012-06-19 15:35:05
        }
        
        if (null !== $query) {
            $params['query'] = $query;
        }
        
        if (null !== $query) {
            $params['query'] = $query;
        }
        if (null !== $query) {
            $params['query'] = $query;
        }
        if (null !== $query) {
            $params['query'] = $query;
        }
        if (null !== $query) {
            $params['query'] = $query;
        }
                
    }
}
