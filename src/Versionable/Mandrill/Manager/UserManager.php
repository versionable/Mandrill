<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\User\User;
use Versionable\Mandrill\User\Sender;
use Versionable\Mandrill\Statistic\Summary;

use Versionable\Common\Collection\Set;

/**
 * Description of UserManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class UserManager extends Manager
{
    const API_BASE = '/users/';
    
    public function ping()
    {
        return $this->doSend('ping');
    }
    
    public function ping2()
    {
        return (array) $this->doSend('ping2');
    }
    
    public function info()
    {
        $response = $this->doSend('info');
        
        return $this->createUser($response);
    }
    
    public function senders()
    {
        $response = $this->doSend('senders');
        
        $senders = new Set();
        foreach ($response as $data) {
            $senders->add($this->createSender($data));
        }
        
        return $senders;
    }
    
    private function createSender(\stdClass $data)
    {
        $sender = new Sender();
            
        $sender->setAddress($data->address);
        $sender->setSent($data->sent);
        $sender->setHardBounces($data->hard_bounces);
        $sender->setSoftBounces($data->soft_bounces);
        $sender->setRejects($data->rejects);
        $sender->setComplaints($data->complaints);
        $sender->setUnsubs($data->unsubs);
        $sender->setOpens($data->opens);
        $sender->setClicks($data->clicks);
        $sender->setCreatedAt(new \DateTime($data->created_at));
        
        return $sender;
    }
    
    private function createUser(\stdClass $data)
    {
        $user = new User();
        
        $user->setUsername($data->username);
        $user->setPublicId($data->public_id);
        $user->setReputation($data->reputation);
        $user->setHourlyQuota($data->hourly_quota);
        $user->setBacklog($data->backlog);
        $user->setCreatedAt(new \DateTime($data->created_at));
        
        foreach (array(
            'today', 'last_7_days', 'last_30_days', 'last_60_days', 'last_90_days', 'all_time'
        ) as $range) {
            $summaryData = $data->stats->$range;
            
            $summary = new Summary();
            
            $summary->setRange($range);
            $summary->setSent($summaryData->sent);
            $summary->setHardBounces($summaryData->hard_bounces);
            $summary->setSoftBounces($summaryData->soft_bounces);
            $summary->setRejects($summaryData->rejects);
            $summary->setComplaints($summaryData->complaints);
            $summary->setUnsubs($summaryData->unsubs);
            $summary->setOpens($summaryData->opens);
            $summary->setUniqueOpens($summaryData->unique_opens);
            $summary->setClicks($summaryData->clicks);
            $summary->setUniqueClicks($summaryData->unique_clicks);
            
            $user->addStat($summary);
        }
        
        return $user;
    }
}
