<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Tag\Tag;
use Versionable\Mandrill\Statistic\Summary;
use Versionable\Mandrill\Statistic\TimeSeries;
use Versionable\Mandrill\Util\Inflector;

use Versionable\Common\Collection\Set;
use Versionable\Common\Collection\Map;

/**
 * Description of UserManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class TagManager extends Manager
{
    const API_BASE = '/tags/';
    
    public function listTags()
    {
         $response = $this->doSend('list');
         
         $tags = new Set();
         foreach ($response as $tag) {
             $tags->add($this->createTag($tag));
         }
         
         return $tags;
    }
    
    public function info($tag)
    {
        $response = $this->doSend('info', array(
            'tag' => $tag
        ));
        
        return $this->createTag($response);
    }
    
    public function timeSeries($tag)
    {
        $response = $this->doSend('time-series', array(
            'tag' => $tag
        ));
        
        $series = new Set();
        foreach ($response as $data) {
            $series->add($this->createTimeSeries($data));
        }
        
        return $series;
    }
    
    public function allTimeSeries()
    {
        $response = $this->doSend('all-time-series');
        
        $all = new Map();
        foreach ($response as $data) {
            $timeSeries = $this->createTimeSeries($data);
            
            $elements = $all->get($data->tag);
            
            if (null === $elements) {
                $elements = new Set();
            }
            
            $elements->add($timeSeries);
            
            $all->put($data->tag, $elements);
        }
        
        return $all;
    }
    
    private function createTimeSeries(\stdClass $data)
    {
        $timeSeries = new TimeSeries();
            
        $timeSeries->setClicks($data->clicks);
        $timeSeries->setComplaints($data->complaints);
        $timeSeries->setHardBounces($data->hard_bounces);
        $timeSeries->setOpens($data->opens);
        $timeSeries->setRejects($data->rejects);
        $timeSeries->setSent($data->sent);
        $timeSeries->setSoftBounces($data->soft_bounces);
        $timeSeries->setTime(new \DateTime($data->time));
        $timeSeries->setUniqueClicks($data->unique_clicks);
        $timeSeries->setUniqueOpens($data->unique_opens);
        $timeSeries->setUnsubs($data->unsubs);
        
        return $timeSeries;
    }
    
    private function createTag(\stdClass $data)
    {
        $tag = new Tag();
        
        $tag->setClicks($data->clicks);
        $tag->setComplaints($data->complaints);
        $tag->setHardBounces($data->hard_bounces);
        $tag->setOpens($data->opens);
        $tag->setRejects($data->rejects);
        $tag->setSent($data->sent);
        $tag->setSoftBounces($data->soft_bounces);
        $tag->setTag($data->tag);
        $tag->setUnsubs($data->unsubs);
        
        if (isset($data->stats)) {
            foreach (array(
                'today', 'last_7_days', 'last_30_days', 'last_60_days', 'last_90_days'
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

                $tag->addStat($summary);
            }
        }
        
        return $tag;
    }
}
