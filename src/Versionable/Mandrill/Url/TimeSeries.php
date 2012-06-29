<?php

namespace Versionable\Mandrill\Url;

/**
 * Description of History
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class TimeSeries
{
    protected $time;
    
    protected $sent;
    
    protected $clicks;
    
    protected $uniqueClicks;
    
    public function __construct()
    {
        $this->sent = 0;
        $this->clicks = 0;
        $this->uniqueClicks = 0;
    }
    
    public function getTime()
    {
        return $this->time;
    }

    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    }

    public function getSent()
    {
        return $this->sent;
    }

    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    public function getClicks()
    {
        return $this->clicks;
    }

    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }

    public function getUniqueClicks()
    {
        return $this->uniqueClicks;
    }

    public function setUniqueClicks($uniqueClicks)
    {
        $this->uniqueClicks = $uniqueClicks;
    }
}
