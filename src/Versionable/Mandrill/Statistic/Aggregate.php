<?php

namespace Versionable\Mandrill\Statistic;

/**
 * Description of Summary
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Aggregate
{
    protected $sent;
    
    protected $hardBounces;
    
    protected $softBounces;
    
    protected $rejects;
    
    protected $complaints;
    
    protected $unsubs;
    
    protected $opens;
    
    protected $uniqueOpens;
    
    protected $clicks;
    
    protected $uniqueClicks;
    
    public function __construct()
    {
        $this->sent = 0;
        $this->hardBounces = 0;
        $this->softBounces = 0;
        $this->rejects = 0;
        $this->complaints = 0;
        $this->unsubs = 0;
        $this->opens = 0;
        $this->uniqueOpens = 0;
        $this->clicks = 0;
        $this->uniqueClicks = 0;
    }

    public function getSent()
    {
        return $this->sent;
    }

    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    public function getHardBounces()
    {
        return $this->hardBounces;
    }

    public function setHardBounces($hardBounces)
    {
        $this->hardBounces = $hardBounces;
    }

    public function getSoftBounces()
    {
        return $this->softBounces;
    }

    public function setSoftBounces($softBounces)
    {
        $this->softBounces = $softBounces;
    }

    public function getRejects()
    {
        return $this->rejects;
    }

    public function setRejects($rejects)
    {
        $this->rejects = $rejects;
    }

    public function getComplaints()
    {
        return $this->complaints;
    }

    public function setComplaints($complaints)
    {
        $this->complaints = $complaints;
    }

    public function getUnsubs()
    {
        return $this->unsubs;
    }

    public function setUnsubs($unsubs)
    {
        $this->unsubs = $unsubs;
    }

    public function getOpens()
    {
        return $this->opens;
    }

    public function setOpens($opens)
    {
        $this->opens = $opens;
    }

    public function getUniqueOpens()
    {
        return $this->uniqueOpens;
    }

    public function setUniqueOpens($uniqueOpens)
    {
        $this->uniqueOpens = $uniqueOpens;
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
