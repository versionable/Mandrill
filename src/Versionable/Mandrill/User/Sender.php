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
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
