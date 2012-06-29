<?php

namespace Versionable\Mandrill\Url;

/**
 * Description of Url
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Url
{
    protected $url;
    
    protected $sent;
    
    protected $clicks;
    
    protected $uniqueClicks;
    
    public function __construct()
    {
        $this->sent = 0;
        $this->clicks = 0;
        $this->uniqueClicks = 0;
    }
    
    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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
