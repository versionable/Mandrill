<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Common\Collection\Set;
use Versionable\Mandrill\Reject\Reject;

/**
 * Description of RejectManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class RejectManager extends Manager
{
    const API_BASE = '/rejects/';
    
    public function listRejects()
    {
        $response = $this->doSend('list');
        
        $rejects = new Set();
        foreach ($response as $data) {
            $rejects->add($this->creatReject($data));
        }
        
        return $rejects;
    }
    
    public function delete($email)
    {
        $response = $this->doSend('delete', new Set(array(
            'email' => $email
        )));
        
        return $response->deleted;
    }
    
    private function createReject(\stdClass $data)
    {
        $reject = new Reject();
        
        $reject->setCreatedAt(new \DateTime($data->created_at));
        $reject->setExpiresAt(new \DateTime($data->expires_at));
        $reject->setEmail($data->email);
        $reject->setReason($data->reason);
        $reject->setSender($data->sender);
        $reject->setExpired($data->expired);
        
        return $reject;
    }
}
