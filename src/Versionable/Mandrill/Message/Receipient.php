<?php

namespace Versionable\Mandrill\Message;

/**
 * Description of Receipient
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Receipient
{
    protected $email;
    
    protected $name;
    
    protected $status;
    
    private $validStatus = array(
        'sent', 'queued', 'rejected'
    );
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        if (false === in_array($status, $this->validStatus)) {
            throw new \InvalidArgumentException(sprintf('Status must be one of %s, "%s" given.', implode(', ', $this->validStatus, $status)));
        }
        
        $this->status = $status;
    }
}
