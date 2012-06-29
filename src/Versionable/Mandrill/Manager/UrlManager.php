<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Url\Url;
use Versionable\Mandrill\Url\TimeSeries;
use Versionable\Common\Collection\Set;

/**
 * Description of UserManager
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class UrlManager extends Manager
{
    const API_BASE = '/urls/';
    
    public function listUrls()
    {
        $response = $this->doSend('list');
        
        $urls = new Set();
        foreach ($response as $data) {
            $urls->add($this->createUrl($data));
        }
        
        return $urls;
    }
    
    public function search($query)
    {
        $response = $this->doSend('search', array(
            'q' => $query
        ));
        
        $urls = new Set();
        foreach ($response as $data) {
            $urls->add($this->createUrl($data));
        }
        
        return $urls;
    }
    
    public function history($url)
    {
        $response = $this->doSend('time-series', array(
            'url' => $url
        ));
        
        $history = new Set();
        foreach ($response as $data) {
            $timeSeries = new TimeSeries();
            
            $timeSeries->setTime(new \DateTime($data->time));
            $timeSeries->setSent($data->sent);
            $timeSeries->setClicks($data->clicks);
            /**
             * Currently missing from from API 
             */
            //$timeSeries->setUniqueClicks($data->unique_clicks);
            
            $history->add($timeSeries);
        }
        
        return $history;
    }
    
    private function createUrl(\stdClass $data)
    {
        $url = new Url();
        
        $url->setSent($data->sent);
        $url->setClicks($data->clicks);
        $url->setUniqueClicks($data->unique_clicks);
        $url->setUrl($data->url);
        
        return $url;
    }
}
