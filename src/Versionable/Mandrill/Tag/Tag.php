<?php

namespace Versionable\Mandrill\Tag;

use Versionable\Mandrill\Statistic\Summary;
use Versionable\Common\Collection\Map;

/**
 * Description of Tag
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Tag
{
    protected $tag;
    
    protected $sent;
    
    protected $hardBounces;
    
    protected $softBounces;
    
    protected $rejects;
    
    protected $complaints;
    
    protected $unsubs;
    
    protected $opens;
    
    protected $clicks;
    
    protected $stats;
    
    public function __construct()
    {
        $this->stats = new Map();
    }
    
    public function getTag()
    {
        return $this->tag;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
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

    public function getClicks()
    {
        return $this->clicks;
    }

    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }
    
    public function getStats()
    {
        return $this->stats;
    }

    public function setStats(array $stats)
    {
        foreach ($stats as $stat) {
            $this->addStat($stat);
        }
    }
    
    public function addStat(Summary $stat)
    {
        $this->stats->put($stat->getRange(), $stat);
    }
}
