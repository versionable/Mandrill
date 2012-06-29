<?php

namespace Versionable\Mandrill\User;

use Versionable\Mandrill\Statistic\Aggregate;

/**
 * Description of Sender
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Sender extends Aggregate
{
    protected $address;
    
    protected $createdAt;
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
