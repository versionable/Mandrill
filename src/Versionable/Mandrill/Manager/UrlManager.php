<?php

namespace Versionable\Mandrill\Manager;

use Versionable\Mandrill\Url\Url;
use Versionable\Mandrill\Url\TimeSeries;

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
        $response = $this->send('list');
        
        $urls = array();
        foreach ($response as $data) {
            $urls[] = $this->creatUrl($data);
        }
        
        return $urls;
    }
    
    public function search($query)
    {
        $response = $this->send('search', array(
            'q' => $query
        ));
        
        $urls = array();
        foreach ($response as $data) {
            $urls = $this->createUrl($data);
        }
        
        return $urls;
    }
    
    public function history($url)
    {
        $response = $this->send('time-series', array(
            'url' => $url
        ));
        
        $history = array();
        foreach ($response as $data) {
            $timeSeries = new TimeSeries();
            
            $timeSeries->setTime(new \DateTime($data->time));
            $timeSeries->setSent($data->sent);
            $timeSeries->setClients($data->clicks);
            $timeSeries->setUniqueClicks($data->unique_clicks);
            
            $history[] = $timeSeries;
        }
        
        return $history;
    }
    
    private function createUrl(\stdClass $data)
    {
        $url = new Url();
        
        $url->setClients($data->clients);
        $url->setSent($data->sent);
        $url->setUniqueClicks($data->unique_clicks);
        $url->setUrl($data->url);
        
        return $url;
    }
}
