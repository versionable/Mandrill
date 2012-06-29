<?php

namespace Versionable\Mandrill\User;

use Versionable\Mandrill\Statistic\Summary;
use Versionable\Common\Collection\Map;

/**
 * Description of User
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class User
{
    protected $username;
    
    protected $publicId;
    
    protected $reputation;
    
    protected $hourlyQuota;
    
    protected $backlog;
    
    protected $stats;
    
    protected $createdAt;
    
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->stats = new Map();
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPublicId()
    {
        return $this->publicId;
    }

    public function setPublicId($publicId)
    {
        $this->publicId = $publicId;
    }

    public function getReputation()
    {
        return $this->reputation;
    }

    public function setReputation($reputation)
    {
        $this->reputation = $reputation;
    }

    public function getHourlyQuota()
    {
        return $this->hourlyQuota;
    }

    public function setHourlyQuota($hourlyQuota)
    {
        $this->hourlyQuota = $hourlyQuota;
    }

    public function getBacklog()
    {
        return $this->backlog;
    }

    public function setBacklog($backlog)
    {
        $this->backlog = $backlog;
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

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
