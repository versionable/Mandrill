<?php

namespace Versionable\Mandrill\Reject;

/**
 * Description of Reject
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Reject
{
    protected $email;
    
    protected $reason;
    
    protected $createdAt;
    
    protected $expiresAt;
    
    protected $expired;
    
    protected $sender;
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    public function getExpired()
    {
        return $this->expired;
    }

    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
    }
}
